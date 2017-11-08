<?php

// Global variable for table object
$t_tinbai_mainsite = NULL;

//
// Table class for t_tinbai_mainsite
//
class ct_tinbai_mainsite {
	var $TableVar = 't_tinbai_mainsite';
	var $TableName = 't_tinbai_mainsite';
	var $TableType = 'CUSTOMVIEW';
	var $PK_TINBAI_ID;
	var $FK_CONGTY_ID;
	var $FK_DMGIOITHIEU_ID;
	var $FK_DMTUYENSINH_ID;
	var $FK_DTSVTUONGLAI_ID;
	var $FK_DTSVDANGHOC_ID;
	var $FK_DTCUUSV_ID;
	var $FK_DTDOANHNGHIEP_ID;
	var $C_TITLE;
	var $C_SUMARY;
	var $C_CONTENTS;
	var $C_HIT_MAINSITE;
	var $C_PIC_HIT;
	var $C_NEW_MYSEFLT;
	var $C_PIC_MYSEFLT;
	var $C_COMMENT_MAINSITE;
	var $C_ORDER_MAINSITE;
	var $C_STATUS_MAINSITE;
	var $C_VISITOR_MAINSITE;
	var $C_ACTIVE_MAINSITE;
	var $C_TIME_ACTIVE_MAINSITE;
	var $FK_NGUOIDUNGID_MAINSITE;
        var $FK_ARRAY_CONGTY;
	var $C_NOTE;
	var $C_USER_ADD;
	var $C_ADD_TIME;
	var $C_USER_EDIT;
	var $C_EDIT_TIME;
	var $FK_EDITOR_ID;
        var $C_SENDMAIL;
	var $C_CONTENTS_MAIL;
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
	function ct_tinbai_mainsite() {
		global $Language;

		// PK_TINBAI_ID
		$this->PK_TINBAI_ID = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_PK_TINBAI_ID', 'PK_TINBAI_ID', 't_tinbai_levelsite.PK_TINBAI_ID', 3, -1, FALSE, 't_tinbai_levelsite.PK_TINBAI_ID', FALSE);
		$this->PK_TINBAI_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['PK_TINBAI_ID'] =& $this->PK_TINBAI_ID;

		// FK_CONGTY_ID
		$this->FK_CONGTY_ID = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_FK_CONGTY_ID', 'FK_CONGTY_ID', 't_tinbai_levelsite.FK_CONGTY_ID', 3, -1, FALSE, 't_tinbai_levelsite.FK_CONGTY_ID', FALSE);
		$this->FK_CONGTY_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_CONGTY_ID'] =& $this->FK_CONGTY_ID;

		// FK_DMGIOITHIEU_ID
		$this->FK_DMGIOITHIEU_ID = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_FK_DMGIOITHIEU_ID', 'FK_DMGIOITHIEU_ID', 't_tinbai_levelsite.FK_DMGIOITHIEU_ID', 3, -1, FALSE, 't_tinbai_levelsite.FK_DMGIOITHIEU_ID', FALSE);
		$this->FK_DMGIOITHIEU_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_DMGIOITHIEU_ID'] =& $this->FK_DMGIOITHIEU_ID;

		// FK_DMTUYENSINH_ID
		$this->FK_DMTUYENSINH_ID = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_FK_DMTUYENSINH_ID', 'FK_DMTUYENSINH_ID', 't_tinbai_levelsite.FK_DMTUYENSINH_ID', 3, -1, FALSE, 't_tinbai_levelsite.FK_DMTUYENSINH_ID', FALSE);
		$this->FK_DMTUYENSINH_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_DMTUYENSINH_ID'] =& $this->FK_DMTUYENSINH_ID;

		// FK_DTSVTUONGLAI_ID
		$this->FK_DTSVTUONGLAI_ID = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_FK_DTSVTUONGLAI_ID', 'FK_DTSVTUONGLAI_ID', 't_tinbai_levelsite.FK_DTSVTUONGLAI_ID', 3, -1, FALSE, 't_tinbai_levelsite.FK_DTSVTUONGLAI_ID', FALSE);
		$this->FK_DTSVTUONGLAI_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_DTSVTUONGLAI_ID'] =& $this->FK_DTSVTUONGLAI_ID;

		// FK_DTSVDANGHOC_ID
		$this->FK_DTSVDANGHOC_ID = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_FK_DTSVDANGHOC_ID', 'FK_DTSVDANGHOC_ID', 't_tinbai_levelsite.FK_DTSVDANGHOC_ID', 3, -1, FALSE, 't_tinbai_levelsite.FK_DTSVDANGHOC_ID', FALSE);
		$this->FK_DTSVDANGHOC_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_DTSVDANGHOC_ID'] =& $this->FK_DTSVDANGHOC_ID;

		// FK_DTCUUSV_ID
		$this->FK_DTCUUSV_ID = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_FK_DTCUUSV_ID', 'FK_DTCUUSV_ID', 't_tinbai_levelsite.FK_DTCUUSV_ID', 3, -1, FALSE, 't_tinbai_levelsite.FK_DTCUUSV_ID', FALSE);
		$this->FK_DTCUUSV_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_DTCUUSV_ID'] =& $this->FK_DTCUUSV_ID;

		// FK_DTDOANHNGHIEP_ID
		$this->FK_DTDOANHNGHIEP_ID = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_FK_DTDOANHNGHIEP_ID', 'FK_DTDOANHNGHIEP_ID', 't_tinbai_levelsite.FK_DTDOANHNGHIEP_ID', 3, -1, FALSE, 't_tinbai_levelsite.FK_DTDOANHNGHIEP_ID', FALSE);
		$this->FK_DTDOANHNGHIEP_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_DTDOANHNGHIEP_ID'] =& $this->FK_DTDOANHNGHIEP_ID;

		// C_TITLE
		$this->C_TITLE = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_TITLE', 'C_TITLE', 't_tinbai_levelsite.C_TITLE', 200, -1, FALSE, 't_tinbai_levelsite.C_TITLE', FALSE);
		$this->fields['C_TITLE'] =& $this->C_TITLE;

		// C_SUMARY
		$this->C_SUMARY = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_SUMARY', 'C_SUMARY', 't_tinbai_levelsite.C_SUMARY', 201, -1, FALSE, 't_tinbai_levelsite.C_SUMARY', FALSE);
		$this->fields['C_SUMARY'] =& $this->C_SUMARY;

		// C_CONTENTS
		$this->C_CONTENTS = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_CONTENTS', 'C_CONTENTS', 't_tinbai_levelsite.C_CONTENTS', 201, -1, FALSE, 't_tinbai_levelsite.C_CONTENTS', FALSE);
		$this->C_CONTENTS->TruncateMemoRemoveHtml = TRUE;
		$this->fields['C_CONTENTS'] =& $this->C_CONTENTS;

		// C_HIT_MAINSITE
		$this->C_HIT_MAINSITE = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_HIT_MAINSITE', 'C_HIT_MAINSITE', 't_tinbai_levelsite.C_HIT_MAINSITE', 200, -1, FALSE, 't_tinbai_levelsite.C_HIT_MAINSITE', FALSE);
		$this->C_HIT_MAINSITE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_HIT_MAINSITE'] =& $this->C_HIT_MAINSITE;

		// C_PIC_HIT
		$this->C_PIC_HIT = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_PIC_HIT', 'C_PIC_HIT', 't_tinbai_levelsite.C_PIC_HIT', 200, -1, FALSE, 't_tinbai_levelsite.C_PIC_HIT', FALSE);
		$this->fields['C_PIC_HIT'] =& $this->C_PIC_HIT;

		// C_NEW_MYSEFLT
		$this->C_NEW_MYSEFLT = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_NEW_MYSEFLT', 'C_NEW_MYSEFLT', 't_tinbai_levelsite.C_NEW_MYSEFLT', 3, -1, FALSE, 't_tinbai_levelsite.C_NEW_MYSEFLT', FALSE);
		$this->C_NEW_MYSEFLT->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_NEW_MYSEFLT'] =& $this->C_NEW_MYSEFLT;

		// C_PIC_MYSEFLT
		$this->C_PIC_MYSEFLT = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_PIC_MYSEFLT', 'C_PIC_MYSEFLT', 't_tinbai_levelsite.C_PIC_MYSEFLT', 200, -1, FALSE, 't_tinbai_levelsite.C_PIC_MYSEFLT', FALSE);
		$this->fields['C_PIC_MYSEFLT'] =& $this->C_PIC_MYSEFLT;

		// C_COMMENT_MAINSITE
		$this->C_COMMENT_MAINSITE = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_COMMENT_MAINSITE', 'C_COMMENT_MAINSITE', 't_tinbai_levelsite.C_COMMENT_MAINSITE', 3, -1, FALSE, 't_tinbai_levelsite.C_COMMENT_MAINSITE', FALSE);
		$this->C_COMMENT_MAINSITE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_COMMENT_MAINSITE'] =& $this->C_COMMENT_MAINSITE;

		// C_ORDER_MAINSITE
		$this->C_ORDER_MAINSITE = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_ORDER_MAINSITE', 'C_ORDER_MAINSITE', 't_tinbai_levelsite.C_ORDER_MAINSITE', 135, 7, FALSE, 't_tinbai_levelsite.C_ORDER_MAINSITE', FALSE);
		$this->C_ORDER_MAINSITE->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_ORDER_MAINSITE'] =& $this->C_ORDER_MAINSITE;

		// C_STATUS_MAINSITE
		$this->C_STATUS_MAINSITE = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_STATUS_MAINSITE', 'C_STATUS_MAINSITE', 't_tinbai_levelsite.C_STATUS', 3, -1, FALSE, 't_tinbai_levelsite.C_STATUS', FALSE);
		$this->C_STATUS_MAINSITE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_STATUS_MAINSITE'] =& $this->C_STATUS_MAINSITE;

		// C_VISITOR_MAINSITE
		$this->C_VISITOR_MAINSITE = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_VISITOR_MAINSITE', 'C_VISITOR_MAINSITE', 't_tinbai_levelsite.C_VISITOR_MAINSITE', 3, -1, FALSE, 't_tinbai_levelsite.C_VISITOR_MAINSITE', FALSE);
		$this->C_VISITOR_MAINSITE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_VISITOR_MAINSITE'] =& $this->C_VISITOR_MAINSITE;

		// C_ACTIVE_MAINSITE
		$this->C_ACTIVE_MAINSITE = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_ACTIVE_MAINSITE', 'C_ACTIVE_MAINSITE', 't_tinbai_levelsite.C_ACTIVE_MAINSITE', 3, -1, FALSE, 't_tinbai_levelsite.C_ACTIVE_MAINSITE', FALSE);
		$this->C_ACTIVE_MAINSITE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_ACTIVE_MAINSITE'] =& $this->C_ACTIVE_MAINSITE;

		// C_TIME_ACTIVE_MAINSITE
		$this->C_TIME_ACTIVE_MAINSITE = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_TIME_ACTIVE_MAINSITE', 'C_TIME_ACTIVE_MAINSITE', 't_tinbai_levelsite.C_TIME_ACTIVE_MAINSITE', 135, 7, FALSE, 't_tinbai_levelsite.C_TIME_ACTIVE_MAINSITE', FALSE);
		$this->C_TIME_ACTIVE_MAINSITE->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_TIME_ACTIVE_MAINSITE'] =& $this->C_TIME_ACTIVE_MAINSITE;

		// FK_NGUOIDUNGID_MAINSITE
		$this->FK_NGUOIDUNGID_MAINSITE = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_FK_NGUOIDUNGID_MAINSITE', 'FK_NGUOIDUNGID_MAINSITE', 't_tinbai_levelsite.FK_NGUOIDUNGID_MAINSITE', 3, -1, FALSE, 't_tinbai_levelsite.FK_NGUOIDUNGID_MAINSITE', FALSE);
		$this->FK_NGUOIDUNGID_MAINSITE->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_NGUOIDUNGID_MAINSITE'] =& $this->FK_NGUOIDUNGID_MAINSITE;

		// C_NOTE
		$this->C_NOTE = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_NOTE', 'C_NOTE', 't_tinbai_levelsite.C_NOTE', 201, -1, FALSE, 't_tinbai_levelsite.C_NOTE', FALSE);
		$this->fields['C_NOTE'] =& $this->C_NOTE;

		// C_USER_ADD
		$this->C_USER_ADD = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_USER_ADD', 'C_USER_ADD', 't_tinbai_levelsite.C_USER_ADD', 3, -1, FALSE, 't_tinbai_levelsite.C_USER_ADD', FALSE);
		$this->C_USER_ADD->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_ADD'] =& $this->C_USER_ADD;

		// C_ADD_TIME
		$this->C_ADD_TIME = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_ADD_TIME', 'C_ADD_TIME', 't_tinbai_levelsite.C_ADD_TIME', 135, 7, FALSE, 't_tinbai_levelsite.C_ADD_TIME', FALSE);
		$this->C_ADD_TIME->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_ADD_TIME'] =& $this->C_ADD_TIME;

		// C_USER_EDIT
		$this->C_USER_EDIT = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_USER_EDIT', 'C_USER_EDIT', 't_tinbai_levelsite.C_USER_EDIT', 3, -1, FALSE, 't_tinbai_levelsite.C_USER_EDIT', FALSE);
		$this->C_USER_EDIT->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_USER_EDIT'] =& $this->C_USER_EDIT;

		// C_EDIT_TIME
		$this->C_EDIT_TIME = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_EDIT_TIME', 'C_EDIT_TIME', 't_tinbai_levelsite.C_EDIT_TIME', 135, 7, FALSE, 't_tinbai_levelsite.C_EDIT_TIME', FALSE);
		$this->C_EDIT_TIME->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateDMY"));
		$this->fields['C_EDIT_TIME'] =& $this->C_EDIT_TIME;

		// FK_EDITOR_ID
		$this->FK_EDITOR_ID = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_FK_EDITOR_ID', 'FK_EDITOR_ID', 't_tinbai_levelsite.FK_EDITOR_ID', 3, -1, FALSE, 't_tinbai_levelsite.FK_EDITOR_ID', FALSE);
		$this->FK_EDITOR_ID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['FK_EDITOR_ID'] =& $this->FK_EDITOR_ID;
                
		// FK_ARRAY_CONGTY
		$this->FK_ARRAY_CONGTY = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_FK_ARRAY_CONGTY', 'FK_ARRAY_CONGTY', 't_tinbai_levelsite.FK_ARRAY_CONGTY', 200, -1, FALSE, 't_tinbai_levelsite.FK_ARRAY_CONGTY', FALSE);
		$this->fields['FK_ARRAY_CONGTY'] =& $this->FK_ARRAY_CONGTY;
                
                // C_SENDMAIL
		$this->C_SENDMAIL = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_SENDMAIL', 'C_SENDMAIL', 't_tinbai_levelsite.C_SENDMAIL', 3, -1, FALSE, 't_tinbai_levelsite.C_SENDMAIL', FALSE);
		$this->C_SENDMAIL->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['C_SENDMAIL'] =& $this->C_SENDMAIL;

		// C_CONTENTS_MAIL
		$this->C_CONTENTS_MAIL = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_CONTENTS_MAIL', 'C_CONTENTS_MAIL', 't_tinbai_levelsite.C_CONTENTS_MAIL', 201, -1, FALSE, 't_tinbai_levelsite.C_CONTENTS_MAIL', FALSE);
		$this->fields['C_CONTENTS_MAIL'] =& $this->C_CONTENTS_MAIL;

		// C_PIC_MAIN
		$this->C_PIC_MAIN = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_PIC_MAIN', 'C_PIC_MAIN', 't_tinbai_levelsite.C_PIC_MAIN', 200, -1, FALSE, 't_tinbai_levelsite.C_PIC_MAIN', FALSE);
		$this->fields['C_PIC_MAIN'] =& $this->C_PIC_MAIN;

		// C_PIC_SCIENCE
		$this->C_PIC_SCIENCE = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_PIC_SCIENCE', 'C_PIC_SCIENCE', 't_tinbai_levelsite.C_PIC_SCIENCE', 200, -1, FALSE, 't_tinbai_levelsite.C_PIC_SCIENCE', FALSE);
		$this->fields['C_PIC_SCIENCE'] =& $this->C_PIC_SCIENCE;

		// C_PIC_ROM
		$this->C_PIC_ROM = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_PIC_ROM', 'C_PIC_ROM', 't_tinbai_levelsite.C_PIC_ROM', 200, -1, FALSE, 't_tinbai_levelsite.C_PIC_ROM', FALSE);
		$this->fields['C_PIC_ROM'] =& $this->C_PIC_ROM;

		// C_PIC_MASS
		$this->C_PIC_MASS = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_PIC_MASS', 'C_PIC_MASS', 't_tinbai_levelsite.C_PIC_MASS', 200, -1, FALSE, 't_tinbai_levelsite.C_PIC_MASS', FALSE);
		$this->fields['C_PIC_MASS'] =& $this->C_PIC_MASS;

		// C_PIC_LIB
		$this->C_PIC_LIB = new cField('t_tinbai_mainsite', 't_tinbai_mainsite', 'x_C_PIC_LIB', 'C_PIC_LIB', 't_tinbai_levelsite.C_PIC_LIB', 200, -1, FALSE, 't_tinbai_levelsite.C_PIC_LIB', FALSE);
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
		return "t_tinbai_mainsite_Highlight";
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
		return "t_tinbai_levelsite";
	}

	function SqlSelect() { // Select
		return "SELECT t_tinbai_levelsite.PK_TINBAI_ID, t_tinbai_levelsite.FK_DMGIOITHIEU_ID, t_tinbai_levelsite.FK_DMTUYENSINH_ID, t_tinbai_levelsite.FK_DTSVTUONGLAI_ID, t_tinbai_levelsite.FK_DTSVDANGHOC_ID, t_tinbai_levelsite.FK_DTCUUSV_ID, t_tinbai_levelsite.FK_DTDOANHNGHIEP_ID, t_tinbai_levelsite.C_TITLE, t_tinbai_levelsite.C_SUMARY, t_tinbai_levelsite.C_CONTENTS, t_tinbai_levelsite.C_HIT_MAINSITE, t_tinbai_levelsite.C_PIC_HIT, t_tinbai_levelsite.C_NEW_MYSEFLT, t_tinbai_levelsite.C_PIC_MYSEFLT, t_tinbai_levelsite.C_COMMENT_MAINSITE, t_tinbai_levelsite.C_ORDER_MAINSITE, t_tinbai_levelsite.C_VISITOR_MAINSITE, t_tinbai_levelsite.C_NOTE, t_tinbai_levelsite.FK_EDITOR_ID, t_tinbai_levelsite.C_ACTIVE_MAINSITE, t_tinbai_levelsite.C_TIME_ACTIVE_MAINSITE, t_tinbai_levelsite.FK_NGUOIDUNGID_MAINSITE, t_tinbai_levelsite.C_STATUS As C_STATUS_MAINSITE, t_tinbai_levelsite.FK_CONGTY_ID, t_tinbai_levelsite.C_USER_ADD, t_tinbai_levelsite.C_ADD_TIME, t_tinbai_levelsite.C_USER_EDIT, t_tinbai_levelsite.C_EDIT_TIME, FK_ARRAY_CONGTY, t_tinbai_levelsite.C_SENDMAIL, t_tinbai_levelsite.C_CONTENTS_MAIL, t_tinbai_levelsite.C_PIC_MAIN, t_tinbai_levelsite.C_PIC_SCIENCE, t_tinbai_levelsite.C_PIC_ROM, t_tinbai_levelsite.C_PIC_MASS, t_tinbai_levelsite.C_PIC_LIB FROM " . $this->SqlFrom();
	}

	function SqlWhere() { // Where
		 global $Security;
                 // gia tri -20 la gia tri thiet bai viet thuoc mainsite
                 $sWhere = "t_tinbai_levelsite.FK_EDITOR_ID = -20";
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
		return "C_ADD_TIME DESC, C_EDIT_TIME DESC";
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
		return "INSERT INTO t_tinbai_levelsite ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE t_tinbai_levelsite SET ";
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
		$SQL = "DELETE FROM t_tinbai_levelsite WHERE ";
		$SQL .= ew_QuotedName('PK_TINBAI_ID') . '=' . ew_QuotedValue($rs['PK_TINBAI_ID'], $this->PK_TINBAI_ID->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "t_tinbai_levelsite.PK_TINBAI_ID = @PK_TINBAI_ID@";
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
			return "t_tinbai_mainsitelist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "t_tinbai_mainsitelist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("t_tinbai_mainsiteview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "t_tinbai_mainsiteadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit URL
	function EditUrl() {
		return $this->KeyUrl("t_tinbai_mainsiteedit.php", $this->UrlParm());
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl() {
		return $this->KeyUrl("t_tinbai_mainsiteadd.php", $this->UrlParm());
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("t_tinbai_mainsitedelete.php", $this->UrlParm());
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=t_tinbai_mainsite" : "";
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
		$this->FK_DMGIOITHIEU_ID->setDbValue($rs->fields('FK_DMGIOITHIEU_ID'));
		$this->FK_DMTUYENSINH_ID->setDbValue($rs->fields('FK_DMTUYENSINH_ID'));
		$this->FK_DTSVTUONGLAI_ID->setDbValue($rs->fields('FK_DTSVTUONGLAI_ID'));
		$this->FK_DTSVDANGHOC_ID->setDbValue($rs->fields('FK_DTSVDANGHOC_ID'));
		$this->FK_DTCUUSV_ID->setDbValue($rs->fields('FK_DTCUUSV_ID'));
		$this->FK_DTDOANHNGHIEP_ID->setDbValue($rs->fields('FK_DTDOANHNGHIEP_ID'));
		$this->C_TITLE->setDbValue($rs->fields('C_TITLE'));
		$this->C_SUMARY->setDbValue($rs->fields('C_SUMARY'));
		$this->C_CONTENTS->setDbValue($rs->fields('C_CONTENTS'));
		$this->C_HIT_MAINSITE->setDbValue($rs->fields('C_HIT_MAINSITE'));
		$this->C_PIC_HIT->Upload->DbValue = $rs->fields('C_PIC_HIT');
		$this->C_NEW_MYSEFLT->setDbValue($rs->fields('C_NEW_MYSEFLT'));
		$this->C_PIC_MYSEFLT->Upload->DbValue = $rs->fields('C_PIC_MYSEFLT');
		$this->C_COMMENT_MAINSITE->setDbValue($rs->fields('C_COMMENT_MAINSITE'));
		$this->C_ORDER_MAINSITE->setDbValue($rs->fields('C_ORDER_MAINSITE'));
		$this->C_STATUS_MAINSITE->setDbValue($rs->fields('C_STATUS_MAINSITE'));
		$this->C_VISITOR_MAINSITE->setDbValue($rs->fields('C_VISITOR_MAINSITE'));
		$this->C_ACTIVE_MAINSITE->setDbValue($rs->fields('C_ACTIVE_MAINSITE'));
		$this->C_TIME_ACTIVE_MAINSITE->setDbValue($rs->fields('C_TIME_ACTIVE_MAINSITE'));
		$this->FK_NGUOIDUNGID_MAINSITE->setDbValue($rs->fields('FK_NGUOIDUNGID_MAINSITE'));
		$this->C_NOTE->setDbValue($rs->fields('C_NOTE'));
		$this->C_USER_ADD->setDbValue($rs->fields('C_USER_ADD'));
		$this->C_ADD_TIME->setDbValue($rs->fields('C_ADD_TIME'));
		$this->C_USER_EDIT->setDbValue($rs->fields('C_USER_EDIT'));
		$this->C_EDIT_TIME->setDbValue($rs->fields('C_EDIT_TIME'));
		$this->FK_EDITOR_ID->setDbValue($rs->fields('FK_EDITOR_ID'));
                $this->FK_ARRAY_CONGTY->setDbValue($rs->fields('FK_ARRAY_CONGTY'));
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

		// FK_DMGIOITHIEU_ID
		$this->FK_DMGIOITHIEU_ID->CellCssStyle = ""; $this->FK_DMGIOITHIEU_ID->CellCssClass = "";
		$this->FK_DMGIOITHIEU_ID->CellAttrs = array(); $this->FK_DMGIOITHIEU_ID->ViewAttrs = array(); $this->FK_DMGIOITHIEU_ID->EditAttrs = array();

		// FK_DMTUYENSINH_ID
		$this->FK_DMTUYENSINH_ID->CellCssStyle = ""; $this->FK_DMTUYENSINH_ID->CellCssClass = "";
		$this->FK_DMTUYENSINH_ID->CellAttrs = array(); $this->FK_DMTUYENSINH_ID->ViewAttrs = array(); $this->FK_DMTUYENSINH_ID->EditAttrs = array();

		// FK_DTSVTUONGLAI_ID
		$this->FK_DTSVTUONGLAI_ID->CellCssStyle = ""; $this->FK_DTSVTUONGLAI_ID->CellCssClass = "";
		$this->FK_DTSVTUONGLAI_ID->CellAttrs = array(); $this->FK_DTSVTUONGLAI_ID->ViewAttrs = array(); $this->FK_DTSVTUONGLAI_ID->EditAttrs = array();

		// FK_DTSVDANGHOC_ID
		$this->FK_DTSVDANGHOC_ID->CellCssStyle = ""; $this->FK_DTSVDANGHOC_ID->CellCssClass = "";
		$this->FK_DTSVDANGHOC_ID->CellAttrs = array(); $this->FK_DTSVDANGHOC_ID->ViewAttrs = array(); $this->FK_DTSVDANGHOC_ID->EditAttrs = array();

		// FK_DTCUUSV_ID
		$this->FK_DTCUUSV_ID->CellCssStyle = ""; $this->FK_DTCUUSV_ID->CellCssClass = "";
		$this->FK_DTCUUSV_ID->CellAttrs = array(); $this->FK_DTCUUSV_ID->ViewAttrs = array(); $this->FK_DTCUUSV_ID->EditAttrs = array();

		// FK_DTDOANHNGHIEP_ID
		$this->FK_DTDOANHNGHIEP_ID->CellCssStyle = ""; $this->FK_DTDOANHNGHIEP_ID->CellCssClass = "";
		$this->FK_DTDOANHNGHIEP_ID->CellAttrs = array(); $this->FK_DTDOANHNGHIEP_ID->ViewAttrs = array(); $this->FK_DTDOANHNGHIEP_ID->EditAttrs = array();

		// C_TITLE
		$this->C_TITLE->CellCssStyle = ""; $this->C_TITLE->CellCssClass = "";
		$this->C_TITLE->CellAttrs = array(); $this->C_TITLE->ViewAttrs = array(); $this->C_TITLE->EditAttrs = array();

		// C_HIT_MAINSITE
		$this->C_HIT_MAINSITE->CellCssStyle = ""; $this->C_HIT_MAINSITE->CellCssClass = "";
		$this->C_HIT_MAINSITE->CellAttrs = array(); $this->C_HIT_MAINSITE->ViewAttrs = array(); $this->C_HIT_MAINSITE->EditAttrs = array();

		// C_NEW_MYSEFLT
		$this->C_NEW_MYSEFLT->CellCssStyle = ""; $this->C_NEW_MYSEFLT->CellCssClass = "";
		$this->C_NEW_MYSEFLT->CellAttrs = array(); $this->C_NEW_MYSEFLT->ViewAttrs = array(); $this->C_NEW_MYSEFLT->EditAttrs = array();

		// C_COMMENT_MAINSITE
		$this->C_COMMENT_MAINSITE->CellCssStyle = ""; $this->C_COMMENT_MAINSITE->CellCssClass = "";
		$this->C_COMMENT_MAINSITE->CellAttrs = array(); $this->C_COMMENT_MAINSITE->ViewAttrs = array(); $this->C_COMMENT_MAINSITE->EditAttrs = array();

		// C_ORDER_MAINSITE
		$this->C_ORDER_MAINSITE->CellCssStyle = ""; $this->C_ORDER_MAINSITE->CellCssClass = "";
		$this->C_ORDER_MAINSITE->CellAttrs = array(); $this->C_ORDER_MAINSITE->ViewAttrs = array(); $this->C_ORDER_MAINSITE->EditAttrs = array();

		// C_STATUS_MAINSITE
		$this->C_STATUS_MAINSITE->CellCssStyle = ""; $this->C_STATUS_MAINSITE->CellCssClass = "";
		$this->C_STATUS_MAINSITE->CellAttrs = array(); $this->C_STATUS_MAINSITE->ViewAttrs = array(); $this->C_STATUS_MAINSITE->EditAttrs = array();

		// C_VISITOR_MAINSITE
		$this->C_VISITOR_MAINSITE->CellCssStyle = ""; $this->C_VISITOR_MAINSITE->CellCssClass = "";
		$this->C_VISITOR_MAINSITE->CellAttrs = array(); $this->C_VISITOR_MAINSITE->ViewAttrs = array(); $this->C_VISITOR_MAINSITE->EditAttrs = array();

		// C_ACTIVE_MAINSITE
		$this->C_ACTIVE_MAINSITE->CellCssStyle = ""; $this->C_ACTIVE_MAINSITE->CellCssClass = "";
		$this->C_ACTIVE_MAINSITE->CellAttrs = array(); $this->C_ACTIVE_MAINSITE->ViewAttrs = array(); $this->C_ACTIVE_MAINSITE->EditAttrs = array();

		// C_TIME_ACTIVE_MAINSITE
		$this->C_TIME_ACTIVE_MAINSITE->CellCssStyle = ""; $this->C_TIME_ACTIVE_MAINSITE->CellCssClass = "";
		$this->C_TIME_ACTIVE_MAINSITE->CellAttrs = array(); $this->C_TIME_ACTIVE_MAINSITE->ViewAttrs = array(); $this->C_TIME_ACTIVE_MAINSITE->EditAttrs = array();

		// FK_NGUOIDUNGID_MAINSITE
		$this->FK_NGUOIDUNGID_MAINSITE->CellCssStyle = ""; $this->FK_NGUOIDUNGID_MAINSITE->CellCssClass = "";
		$this->FK_NGUOIDUNGID_MAINSITE->CellAttrs = array(); $this->FK_NGUOIDUNGID_MAINSITE->ViewAttrs = array(); $this->FK_NGUOIDUNGID_MAINSITE->EditAttrs = array();

		// C_NOTE
		$this->C_NOTE->CellCssStyle = ""; $this->C_NOTE->CellCssClass = "";
		$this->C_NOTE->CellAttrs = array(); $this->C_NOTE->ViewAttrs = array(); $this->C_NOTE->EditAttrs = array();

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

		// FK_EDITOR_ID
		$this->FK_EDITOR_ID->CellCssStyle = ""; $this->FK_EDITOR_ID->CellCssClass = "";
		$this->FK_EDITOR_ID->CellAttrs = array(); $this->FK_EDITOR_ID->ViewAttrs = array(); $this->FK_EDITOR_ID->EditAttrs = array();

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

		// FK_DMGIOITHIEU_ID
		if (strval($this->FK_DMGIOITHIEU_ID->CurrentValue) <> "") {
			$sFilterWrk = "`PK_DANHMUCGIOITHIEU` = " . ew_AdjustSql($this->FK_DMGIOITHIEU_ID->CurrentValue) . "";
		$sSqlWrk = "SELECT `C_NAME` FROM `t_danhmucgioithieu`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->FK_DMGIOITHIEU_ID->ViewValue = $rswrk->fields('C_NAME');
				$rswrk->Close();
			} else {
				$this->FK_DMGIOITHIEU_ID->ViewValue = $this->FK_DMGIOITHIEU_ID->CurrentValue;
			}
		} else {
			$this->FK_DMGIOITHIEU_ID->ViewValue = NULL;
		}
		$this->FK_DMGIOITHIEU_ID->CssStyle = "";
		$this->FK_DMGIOITHIEU_ID->CssClass = "";
		$this->FK_DMGIOITHIEU_ID->ViewCustomAttributes = "";

		// FK_DMTUYENSINH_ID
		if (strval($this->FK_DMTUYENSINH_ID->CurrentValue) <> "") {
			$sFilterWrk = "`PK_DANHMUCTUYENSINH` = " . ew_AdjustSql($this->FK_DMTUYENSINH_ID->CurrentValue) . "";
		$sSqlWrk = "SELECT `C_NAME` FROM `t_danhmuctuyensinh`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->FK_DMTUYENSINH_ID->ViewValue = $rswrk->fields('C_NAME');
				$rswrk->Close();
			} else {
				$this->FK_DMTUYENSINH_ID->ViewValue = $this->FK_DMTUYENSINH_ID->CurrentValue;
			}
		} else {
			$this->FK_DMTUYENSINH_ID->ViewValue = NULL;
		}
		$this->FK_DMTUYENSINH_ID->CssStyle = "";
		$this->FK_DMTUYENSINH_ID->CssClass = "";
		$this->FK_DMTUYENSINH_ID->ViewCustomAttributes = "";

		// FK_DTSVTUONGLAI_ID
		if (strval($this->FK_DTSVTUONGLAI_ID->CurrentValue) <> "") {
			$sFilterWrk = "`DTSVTUONGLAI_ID` = " . ew_AdjustSql($this->FK_DTSVTUONGLAI_ID->CurrentValue) . "";
		$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_svtuonglai`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->FK_DTSVTUONGLAI_ID->ViewValue = $rswrk->fields('C_NAME');
				$rswrk->Close();
			} else {
				$this->FK_DTSVTUONGLAI_ID->ViewValue = $this->FK_DTSVTUONGLAI_ID->CurrentValue;
			}
		} else {
			$this->FK_DTSVTUONGLAI_ID->ViewValue = NULL;
		}
		$this->FK_DTSVTUONGLAI_ID->CssStyle = "";
		$this->FK_DTSVTUONGLAI_ID->CssClass = "";
		$this->FK_DTSVTUONGLAI_ID->ViewCustomAttributes = "";

		// FK_DTSVDANGHOC_ID
		if (strval($this->FK_DTSVDANGHOC_ID->CurrentValue) <> "") {
			$sFilterWrk = "`DTSVDANGHOC_ID` = " . ew_AdjustSql($this->FK_DTSVDANGHOC_ID->CurrentValue) . "";
		$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_svdanghoc`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->FK_DTSVDANGHOC_ID->ViewValue = $rswrk->fields('C_NAME');
				$rswrk->Close();
			} else {
				$this->FK_DTSVDANGHOC_ID->ViewValue = $this->FK_DTSVDANGHOC_ID->CurrentValue;
			}
		} else {
			$this->FK_DTSVDANGHOC_ID->ViewValue = NULL;
		}
		$this->FK_DTSVDANGHOC_ID->CssStyle = "";
		$this->FK_DTSVDANGHOC_ID->CssClass = "";
		$this->FK_DTSVDANGHOC_ID->ViewCustomAttributes = "";

		// FK_DTCUUSV_ID
		if (strval($this->FK_DTCUUSV_ID->CurrentValue) <> "") {
			$sFilterWrk = "`DTCUUSV_ID` = " . ew_AdjustSql($this->FK_DTCUUSV_ID->CurrentValue) . "";
		$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_cuusv`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->FK_DTCUUSV_ID->ViewValue = $rswrk->fields('C_NAME');
				$rswrk->Close();
			} else {
				$this->FK_DTCUUSV_ID->ViewValue = $this->FK_DTCUUSV_ID->CurrentValue;
			}
		} else {
			$this->FK_DTCUUSV_ID->ViewValue = NULL;
		}
		$this->FK_DTCUUSV_ID->CssStyle = "";
		$this->FK_DTCUUSV_ID->CssClass = "";
		$this->FK_DTCUUSV_ID->ViewCustomAttributes = "";

		// FK_DTDOANHNGHIEP_ID
		if (strval($this->FK_DTDOANHNGHIEP_ID->CurrentValue) <> "") {
			$sFilterWrk = "`DTDOANHNGHIEP_ID` = " . ew_AdjustSql($this->FK_DTDOANHNGHIEP_ID->CurrentValue) . "";
		$sSqlWrk = "SELECT `C_NAME` FROM `t_doituong_doanhnghiep`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->FK_DTDOANHNGHIEP_ID->ViewValue = $rswrk->fields('C_NAME');
				$rswrk->Close();
			} else {
				$this->FK_DTDOANHNGHIEP_ID->ViewValue = $this->FK_DTDOANHNGHIEP_ID->CurrentValue;
			}
		} else {
			$this->FK_DTDOANHNGHIEP_ID->ViewValue = NULL;
		}
		$this->FK_DTDOANHNGHIEP_ID->CssStyle = "";
		$this->FK_DTDOANHNGHIEP_ID->CssClass = "";
		$this->FK_DTDOANHNGHIEP_ID->ViewCustomAttributes = "";
                
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

		// C_TITLE
		$this->C_TITLE->ViewValue = $this->C_TITLE->CurrentValue;
		$this->C_TITLE->CssStyle = "";
		$this->C_TITLE->CssClass = "";
		$this->C_TITLE->ViewCustomAttributes = "";

		// C_HIT_MAINSITE
		if (strval($this->C_HIT_MAINSITE->CurrentValue) <> "") {
			switch ($this->C_HIT_MAINSITE->CurrentValue) {
				case "0":
					$this->C_HIT_MAINSITE->ViewValue = "Khong la tin noi bat";
					break;
				case "1":
					$this->C_HIT_MAINSITE->ViewValue = "La tin noi bat";
					break;
				default:
					$this->C_HIT_MAINSITE->ViewValue = $this->C_HIT_MAINSITE->CurrentValue;
			}
		} else {
			$this->C_HIT_MAINSITE->ViewValue = NULL;
		}
		$this->C_HIT_MAINSITE->CssStyle = "";
		$this->C_HIT_MAINSITE->CssClass = "";
		$this->C_HIT_MAINSITE->ViewCustomAttributes = "";

		// C_NEW_MYSEFLT
		if (strval($this->C_NEW_MYSEFLT->CurrentValue) <> "") {
			switch ($this->C_NEW_MYSEFLT->CurrentValue) {
				case "0":
					$this->C_NEW_MYSEFLT->ViewValue = "Khong la tin ";
					break;
				case "1":
					$this->C_NEW_MYSEFLT->ViewValue = "Tin ";
					break;
				default:
					$this->C_NEW_MYSEFLT->ViewValue = $this->C_NEW_MYSEFLT->CurrentValue;
			}
		} else {
			$this->C_NEW_MYSEFLT->ViewValue = NULL;
		}
		$this->C_NEW_MYSEFLT->CssStyle = "";
		$this->C_NEW_MYSEFLT->CssClass = "";
		$this->C_NEW_MYSEFLT->ViewCustomAttributes = "";

		// C_COMMENT_MAINSITE
		if (strval($this->C_COMMENT_MAINSITE->CurrentValue) <> "") {
			switch ($this->C_COMMENT_MAINSITE->CurrentValue) {
				case "0":
					$this->C_COMMENT_MAINSITE->ViewValue = "Khong cho phep comment";
					break;
				case "1":
					$this->C_COMMENT_MAINSITE->ViewValue = "Cho phep coment";
					break;
				default:
					$this->C_COMMENT_MAINSITE->ViewValue = $this->C_COMMENT_MAINSITE->CurrentValue;
			}
		} else {
			$this->C_COMMENT_MAINSITE->ViewValue = NULL;
		}
		$this->C_COMMENT_MAINSITE->CssStyle = "";
		$this->C_COMMENT_MAINSITE->CssClass = "";
		$this->C_COMMENT_MAINSITE->ViewCustomAttributes = "";

		// C_ORDER_MAINSITE
		$this->C_ORDER_MAINSITE->ViewValue = $this->C_ORDER_MAINSITE->CurrentValue;
		$this->C_ORDER_MAINSITE->ViewValue = ew_FormatDateTime($this->C_ORDER_MAINSITE->ViewValue, 7);
		$this->C_ORDER_MAINSITE->CssStyle = "";
		$this->C_ORDER_MAINSITE->CssClass = "";
		$this->C_ORDER_MAINSITE->ViewCustomAttributes = "";

		// C_STATUS_MAINSITE
		if (strval($this->C_STATUS_MAINSITE->CurrentValue) <> "") {
			switch ($this->C_STATUS_MAINSITE->CurrentValue) {
				case "0":
					$this->C_STATUS_MAINSITE->ViewValue = "KHONG DUYET";
					break;
				case "1":
					$this->C_STATUS_MAINSITE->ViewValue = "DA DUYET";
					break;
				case "":
					$this->C_STATUS_MAINSITE->ViewValue = "";
					break;
				default:
					$this->C_STATUS_MAINSITE->ViewValue = $this->C_STATUS_MAINSITE->CurrentValue;
			}
		} else {
			$this->C_STATUS_MAINSITE->ViewValue = NULL;
		}
		$this->C_STATUS_MAINSITE->CssStyle = "";
		$this->C_STATUS_MAINSITE->CssClass = "";
		$this->C_STATUS_MAINSITE->ViewCustomAttributes = "";

		// C_VISITOR_MAINSITE
		$this->C_VISITOR_MAINSITE->ViewValue = $this->C_VISITOR_MAINSITE->CurrentValue;
		$this->C_VISITOR_MAINSITE->CssStyle = "";
		$this->C_VISITOR_MAINSITE->CssClass = "";
		$this->C_VISITOR_MAINSITE->ViewCustomAttributes = "";

		// C_ACTIVE_MAINSITE
		if (strval($this->C_ACTIVE_MAINSITE->CurrentValue) <> "") {
			switch ($this->C_ACTIVE_MAINSITE->CurrentValue) {
				case "0":
					$this->C_ACTIVE_MAINSITE->ViewValue = "khong active len mainsite";
					break;
				case "1":
					$this->C_ACTIVE_MAINSITE->ViewValue = "Active lenmainsite";
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

		// C_TIME_ACTIVE_MAINSITE
		$this->C_TIME_ACTIVE_MAINSITE->ViewValue = $this->C_TIME_ACTIVE_MAINSITE->CurrentValue;
		$this->C_TIME_ACTIVE_MAINSITE->ViewValue = ew_FormatDateTime($this->C_TIME_ACTIVE_MAINSITE->ViewValue, 7);
		$this->C_TIME_ACTIVE_MAINSITE->CssStyle = "";
		$this->C_TIME_ACTIVE_MAINSITE->CssClass = "";
		$this->C_TIME_ACTIVE_MAINSITE->ViewCustomAttributes = "";

		// FK_NGUOIDUNGID_MAINSITE
		$this->FK_NGUOIDUNGID_MAINSITE->ViewValue = $this->FK_NGUOIDUNGID_MAINSITE->CurrentValue;
		if (strval($this->FK_NGUOIDUNGID_MAINSITE->CurrentValue) <> "") {
			$sFilterWrk = "`PK_NGUOIDUNG_ID` = " . ew_AdjustSql($this->FK_NGUOIDUNGID_MAINSITE->CurrentValue) . "";
		$sSqlWrk = "SELECT `C_HOTEN` FROM `t_nguoidung`";
		$sWhereWrk = "";
		if ($sFilterWrk <> "") {
			if ($sWhereWrk <> "") $sWhereWrk .= " AND ";
			$sWhereWrk .= "(" . $sFilterWrk . ")";
		}
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$this->FK_NGUOIDUNGID_MAINSITE->ViewValue = $rswrk->fields('C_HOTEN');
				$rswrk->Close();
			} else {
				$this->FK_NGUOIDUNGID_MAINSITE->ViewValue = $this->FK_NGUOIDUNGID_MAINSITE->CurrentValue;
			}
		} else {
			$this->FK_NGUOIDUNGID_MAINSITE->ViewValue = NULL;
		}
		$this->FK_NGUOIDUNGID_MAINSITE->CssStyle = "";
		$this->FK_NGUOIDUNGID_MAINSITE->CssClass = "";
		$this->FK_NGUOIDUNGID_MAINSITE->ViewCustomAttributes = "";

		// C_NOTE
		$this->C_NOTE->ViewValue = $this->C_NOTE->CurrentValue;
		$this->C_NOTE->CssStyle = "";
		$this->C_NOTE->CssClass = "";
		$this->C_NOTE->ViewCustomAttributes = "";

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

		// FK_EDITOR_ID
		$this->FK_EDITOR_ID->ViewValue = $this->FK_EDITOR_ID->CurrentValue;
		$this->FK_EDITOR_ID->ViewValue = ew_FormatNumber($this->FK_EDITOR_ID->ViewValue, 0, -2, -2, -2);
		$this->FK_EDITOR_ID->CssStyle = "";
		$this->FK_EDITOR_ID->CssClass = "";
		$this->FK_EDITOR_ID->ViewCustomAttributes = "";

		// FK_CONGTY_ID
		$this->FK_CONGTY_ID->HrefValue = "";
		$this->FK_CONGTY_ID->TooltipValue = "";

		// FK_DMGIOITHIEU_ID
		$this->FK_DMGIOITHIEU_ID->HrefValue = "";
		$this->FK_DMGIOITHIEU_ID->TooltipValue = "";

		// FK_DMTUYENSINH_ID
		$this->FK_DMTUYENSINH_ID->HrefValue = "";
		$this->FK_DMTUYENSINH_ID->TooltipValue = "";

		// FK_DTSVTUONGLAI_ID
		$this->FK_DTSVTUONGLAI_ID->HrefValue = "";
		$this->FK_DTSVTUONGLAI_ID->TooltipValue = "";

		// FK_DTSVDANGHOC_ID
		$this->FK_DTSVDANGHOC_ID->HrefValue = "";
		$this->FK_DTSVDANGHOC_ID->TooltipValue = "";

		// FK_DTCUUSV_ID
		$this->FK_DTCUUSV_ID->HrefValue = "";
		$this->FK_DTCUUSV_ID->TooltipValue = "";

		// FK_DTDOANHNGHIEP_ID
		$this->FK_DTDOANHNGHIEP_ID->HrefValue = "";
		$this->FK_DTDOANHNGHIEP_ID->TooltipValue = "";

		// C_TITLE
		$this->C_TITLE->HrefValue = "";
		$this->C_TITLE->TooltipValue = "";

		// C_HIT_MAINSITE
		$this->C_HIT_MAINSITE->HrefValue = "";
		$this->C_HIT_MAINSITE->TooltipValue = "";

		// C_NEW_MYSEFLT
		$this->C_NEW_MYSEFLT->HrefValue = "";
		$this->C_NEW_MYSEFLT->TooltipValue = "";

		// C_COMMENT_MAINSITE
		$this->C_COMMENT_MAINSITE->HrefValue = "";
		$this->C_COMMENT_MAINSITE->TooltipValue = "";

		// C_ORDER_MAINSITE
		$this->C_ORDER_MAINSITE->HrefValue = "";
		$this->C_ORDER_MAINSITE->TooltipValue = "";

		// C_STATUS_MAINSITE
		$this->C_STATUS_MAINSITE->HrefValue = "";
		$this->C_STATUS_MAINSITE->TooltipValue = "";

		// C_VISITOR_MAINSITE
		$this->C_VISITOR_MAINSITE->HrefValue = "";
		$this->C_VISITOR_MAINSITE->TooltipValue = "";

		// C_ACTIVE_MAINSITE
		$this->C_ACTIVE_MAINSITE->HrefValue = "";
		$this->C_ACTIVE_MAINSITE->TooltipValue = "";

		// C_TIME_ACTIVE_MAINSITE
		$this->C_TIME_ACTIVE_MAINSITE->HrefValue = "";
		$this->C_TIME_ACTIVE_MAINSITE->TooltipValue = "";

		// FK_NGUOIDUNGID_MAINSITE
		$this->FK_NGUOIDUNGID_MAINSITE->HrefValue = "";
		$this->FK_NGUOIDUNGID_MAINSITE->TooltipValue = "";

		// C_NOTE
		$this->C_NOTE->HrefValue = "";
		$this->C_NOTE->TooltipValue = "";

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

		// FK_EDITOR_ID
		$this->FK_EDITOR_ID->HrefValue = "";
		$this->FK_EDITOR_ID->TooltipValue = "";

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
