<?php

// Global variable for table object
$NhanVien = NULL;

//
// Table class for NhanVien
//
class cNhanVien {
	var $TableVar = 'NhanVien';
	var $TableName = 'NhanVien';
	var $TableType = 'TABLE';
	var $NhanVienID;
	var $HoTen;
	var $NgaySinh;
	var $GioiTinh;
	var $DanToc;
	var $TonGiao;
	var $SoCMND;
	var $NgayCapCMND;
	var $NoiCapCMND;
	var $DiaChi;
	var $DienThoai;
	var $zEmail;
	var $IsGiaoVien;
	var $ChucVuID;
	var $TrinhDoID;
	var $BacLuong;
	var $HeSoLuong;
	var $LuongCoBan;
	var $LuongNgay;
	var $NgayNangLuong;
	var $NgayVaoLamViec;
	var $DaNghiViec;
	var $NgayNghiViec;
	var $IsDangVien;
	var $NgayVaoDang;
	var $SoTheDang;
	var $ThanhPhanGiaDinh;
	var $HoTenCha;
	var $NamSinhCha;
	var $NgheNghiepCha;
	var $HoTenMe;
	var $NamSinhMe;
	var $NgheNghiepMe;
	var $DiaChiChaMe;
	var $DienThoaiChaMe;
	var $HoTenVoChong;
	var $NamSinhVoChong;
	var $NgheNghiepVoChong;
	var $DienThoaiVoChong;
	var $HinhAnhNhanVien;
	var $Ho;
	var $Ten;
	var $LoaiHopDong;
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
	function cNhanVien() {
		global $Language;

		// NhanVienID
		$this->NhanVienID = new cField('NhanVien', 'NhanVien', 'x_NhanVienID', 'NhanVienID', '[NhanVienID]', 3, -1, FALSE, '[NhanVienID]', FALSE);
		$this->NhanVienID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['NhanVienID'] =& $this->NhanVienID;

		// HoTen
		$this->HoTen = new cField('NhanVien', 'NhanVien', 'x_HoTen', 'HoTen', '[HoTen]', 202, -1, FALSE, '[HoTen]', FALSE);
		$this->fields['HoTen'] =& $this->HoTen;

		// NgaySinh
		$this->NgaySinh = new cField('NhanVien', 'NhanVien', 'x_NgaySinh', 'NgaySinh', '[NgaySinh]', 135, 5, FALSE, '[NgaySinh]', FALSE);
		$this->NgaySinh->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateYMD"));
		$this->fields['NgaySinh'] =& $this->NgaySinh;

		// GioiTinh
		$this->GioiTinh = new cField('NhanVien', 'NhanVien', 'x_GioiTinh', 'GioiTinh', '[GioiTinh]', 11, -1, FALSE, '[GioiTinh]', FALSE);
		$this->GioiTinh->FldDataType = EW_DATATYPE_BOOLEAN;
		$this->fields['GioiTinh'] =& $this->GioiTinh;

		// DanToc
		$this->DanToc = new cField('NhanVien', 'NhanVien', 'x_DanToc', 'DanToc', '[DanToc]', 202, -1, FALSE, '[DanToc]', FALSE);
		$this->fields['DanToc'] =& $this->DanToc;

		// TonGiao
		$this->TonGiao = new cField('NhanVien', 'NhanVien', 'x_TonGiao', 'TonGiao', '[TonGiao]', 202, -1, FALSE, '[TonGiao]', FALSE);
		$this->fields['TonGiao'] =& $this->TonGiao;

		// SoCMND
		$this->SoCMND = new cField('NhanVien', 'NhanVien', 'x_SoCMND', 'SoCMND', '[SoCMND]', 202, -1, FALSE, '[SoCMND]', FALSE);
		$this->fields['SoCMND'] =& $this->SoCMND;

		// NgayCapCMND
		$this->NgayCapCMND = new cField('NhanVien', 'NhanVien', 'x_NgayCapCMND', 'NgayCapCMND', '[NgayCapCMND]', 202, -1, FALSE, '[NgayCapCMND]', FALSE);
		$this->fields['NgayCapCMND'] =& $this->NgayCapCMND;

		// NoiCapCMND
		$this->NoiCapCMND = new cField('NhanVien', 'NhanVien', 'x_NoiCapCMND', 'NoiCapCMND', '[NoiCapCMND]', 202, -1, FALSE, '[NoiCapCMND]', FALSE);
		$this->fields['NoiCapCMND'] =& $this->NoiCapCMND;

		// DiaChi
		$this->DiaChi = new cField('NhanVien', 'NhanVien', 'x_DiaChi', 'DiaChi', '[DiaChi]', 202, -1, FALSE, '[DiaChi]', FALSE);
		$this->fields['DiaChi'] =& $this->DiaChi;

		// DienThoai
		$this->DienThoai = new cField('NhanVien', 'NhanVien', 'x_DienThoai', 'DienThoai', '[DienThoai]', 202, -1, FALSE, '[DienThoai]', FALSE);
		$this->fields['DienThoai'] =& $this->DienThoai;

		// Email
		$this->zEmail = new cField('NhanVien', 'NhanVien', 'x_zEmail', 'Email', '[Email]', 202, -1, FALSE, '[Email]', FALSE);
		$this->fields['Email'] =& $this->zEmail;

		// IsGiaoVien
		$this->IsGiaoVien = new cField('NhanVien', 'NhanVien', 'x_IsGiaoVien', 'IsGiaoVien', '[IsGiaoVien]', 11, -1, FALSE, '[IsGiaoVien]', FALSE);
		$this->IsGiaoVien->FldDataType = EW_DATATYPE_BOOLEAN;
		$this->fields['IsGiaoVien'] =& $this->IsGiaoVien;

		// ChucVuID
		$this->ChucVuID = new cField('NhanVien', 'NhanVien', 'x_ChucVuID', 'ChucVuID', '[ChucVuID]', 3, -1, FALSE, '[ChucVuID]', FALSE);
		$this->ChucVuID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['ChucVuID'] =& $this->ChucVuID;

		// TrinhDoID
		$this->TrinhDoID = new cField('NhanVien', 'NhanVien', 'x_TrinhDoID', 'TrinhDoID', '[TrinhDoID]', 3, -1, FALSE, '[TrinhDoID]', FALSE);
		$this->TrinhDoID->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['TrinhDoID'] =& $this->TrinhDoID;

		// BacLuong
		$this->BacLuong = new cField('NhanVien', 'NhanVien', 'x_BacLuong', 'BacLuong', '[BacLuong]', 3, -1, FALSE, '[BacLuong]', FALSE);
		$this->BacLuong->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['BacLuong'] =& $this->BacLuong;

		// HeSoLuong
		$this->HeSoLuong = new cField('NhanVien', 'NhanVien', 'x_HeSoLuong', 'HeSoLuong', '[HeSoLuong]', 5, -1, FALSE, '[HeSoLuong]', FALSE);
		$this->HeSoLuong->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['HeSoLuong'] =& $this->HeSoLuong;

		// LuongCoBan
		$this->LuongCoBan = new cField('NhanVien', 'NhanVien', 'x_LuongCoBan', 'LuongCoBan', '[LuongCoBan]', 5, -1, FALSE, '[LuongCoBan]', FALSE);
		$this->LuongCoBan->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['LuongCoBan'] =& $this->LuongCoBan;

		// LuongNgay
		$this->LuongNgay = new cField('NhanVien', 'NhanVien', 'x_LuongNgay', 'LuongNgay', '[LuongNgay]', 5, -1, FALSE, '[LuongNgay]', FALSE);
		$this->LuongNgay->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['LuongNgay'] =& $this->LuongNgay;

		// NgayNangLuong
		$this->NgayNangLuong = new cField('NhanVien', 'NhanVien', 'x_NgayNangLuong', 'NgayNangLuong', '[NgayNangLuong]', 202, -1, FALSE, '[NgayNangLuong]', FALSE);
		$this->fields['NgayNangLuong'] =& $this->NgayNangLuong;

		// NgayVaoLamViec
		$this->NgayVaoLamViec = new cField('NhanVien', 'NhanVien', 'x_NgayVaoLamViec', 'NgayVaoLamViec', '[NgayVaoLamViec]', 135, 5, FALSE, '[NgayVaoLamViec]', FALSE);
		$this->NgayVaoLamViec->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateYMD"));
		$this->fields['NgayVaoLamViec'] =& $this->NgayVaoLamViec;

		// DaNghiViec
		$this->DaNghiViec = new cField('NhanVien', 'NhanVien', 'x_DaNghiViec', 'DaNghiViec', '[DaNghiViec]', 11, -1, FALSE, '[DaNghiViec]', FALSE);
		$this->DaNghiViec->FldDataType = EW_DATATYPE_BOOLEAN;
		$this->fields['DaNghiViec'] =& $this->DaNghiViec;

		// NgayNghiViec
		$this->NgayNghiViec = new cField('NhanVien', 'NhanVien', 'x_NgayNghiViec', 'NgayNghiViec', '[NgayNghiViec]', 135, 5, FALSE, '[NgayNghiViec]', FALSE);
		$this->NgayNghiViec->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateYMD"));
		$this->fields['NgayNghiViec'] =& $this->NgayNghiViec;

		// IsDangVien
		$this->IsDangVien = new cField('NhanVien', 'NhanVien', 'x_IsDangVien', 'IsDangVien', '[IsDangVien]', 11, -1, FALSE, '[IsDangVien]', FALSE);
		$this->IsDangVien->FldDataType = EW_DATATYPE_BOOLEAN;
		$this->fields['IsDangVien'] =& $this->IsDangVien;

		// NgayVaoDang
		$this->NgayVaoDang = new cField('NhanVien', 'NhanVien', 'x_NgayVaoDang', 'NgayVaoDang', '[NgayVaoDang]', 202, -1, FALSE, '[NgayVaoDang]', FALSE);
		$this->fields['NgayVaoDang'] =& $this->NgayVaoDang;

		// SoTheDang
		$this->SoTheDang = new cField('NhanVien', 'NhanVien', 'x_SoTheDang', 'SoTheDang', '[SoTheDang]', 202, -1, FALSE, '[SoTheDang]', FALSE);
		$this->fields['SoTheDang'] =& $this->SoTheDang;

		// ThanhPhanGiaDinh
		$this->ThanhPhanGiaDinh = new cField('NhanVien', 'NhanVien', 'x_ThanhPhanGiaDinh', 'ThanhPhanGiaDinh', '[ThanhPhanGiaDinh]', 202, -1, FALSE, '[ThanhPhanGiaDinh]', FALSE);
		$this->fields['ThanhPhanGiaDinh'] =& $this->ThanhPhanGiaDinh;

		// HoTenCha
		$this->HoTenCha = new cField('NhanVien', 'NhanVien', 'x_HoTenCha', 'HoTenCha', '[HoTenCha]', 202, -1, FALSE, '[HoTenCha]', FALSE);
		$this->fields['HoTenCha'] =& $this->HoTenCha;

		// NamSinhCha
		$this->NamSinhCha = new cField('NhanVien', 'NhanVien', 'x_NamSinhCha', 'NamSinhCha', '[NamSinhCha]', 202, -1, FALSE, '[NamSinhCha]', FALSE);
		$this->fields['NamSinhCha'] =& $this->NamSinhCha;

		// NgheNghiepCha
		$this->NgheNghiepCha = new cField('NhanVien', 'NhanVien', 'x_NgheNghiepCha', 'NgheNghiepCha', '[NgheNghiepCha]', 202, -1, FALSE, '[NgheNghiepCha]', FALSE);
		$this->fields['NgheNghiepCha'] =& $this->NgheNghiepCha;

		// HoTenMe
		$this->HoTenMe = new cField('NhanVien', 'NhanVien', 'x_HoTenMe', 'HoTenMe', '[HoTenMe]', 202, -1, FALSE, '[HoTenMe]', FALSE);
		$this->fields['HoTenMe'] =& $this->HoTenMe;

		// NamSinhMe
		$this->NamSinhMe = new cField('NhanVien', 'NhanVien', 'x_NamSinhMe', 'NamSinhMe', '[NamSinhMe]', 202, -1, FALSE, '[NamSinhMe]', FALSE);
		$this->fields['NamSinhMe'] =& $this->NamSinhMe;

		// NgheNghiepMe
		$this->NgheNghiepMe = new cField('NhanVien', 'NhanVien', 'x_NgheNghiepMe', 'NgheNghiepMe', '[NgheNghiepMe]', 202, -1, FALSE, '[NgheNghiepMe]', FALSE);
		$this->fields['NgheNghiepMe'] =& $this->NgheNghiepMe;

		// DiaChiChaMe
		$this->DiaChiChaMe = new cField('NhanVien', 'NhanVien', 'x_DiaChiChaMe', 'DiaChiChaMe', '[DiaChiChaMe]', 202, -1, FALSE, '[DiaChiChaMe]', FALSE);
		$this->fields['DiaChiChaMe'] =& $this->DiaChiChaMe;

		// DienThoaiChaMe
		$this->DienThoaiChaMe = new cField('NhanVien', 'NhanVien', 'x_DienThoaiChaMe', 'DienThoaiChaMe', '[DienThoaiChaMe]', 202, -1, FALSE, '[DienThoaiChaMe]', FALSE);
		$this->fields['DienThoaiChaMe'] =& $this->DienThoaiChaMe;

		// HoTenVoChong
		$this->HoTenVoChong = new cField('NhanVien', 'NhanVien', 'x_HoTenVoChong', 'HoTenVoChong', '[HoTenVoChong]', 202, -1, FALSE, '[HoTenVoChong]', FALSE);
		$this->fields['HoTenVoChong'] =& $this->HoTenVoChong;

		// NamSinhVoChong
		$this->NamSinhVoChong = new cField('NhanVien', 'NhanVien', 'x_NamSinhVoChong', 'NamSinhVoChong', '[NamSinhVoChong]', 202, -1, FALSE, '[NamSinhVoChong]', FALSE);
		$this->fields['NamSinhVoChong'] =& $this->NamSinhVoChong;

		// NgheNghiepVoChong
		$this->NgheNghiepVoChong = new cField('NhanVien', 'NhanVien', 'x_NgheNghiepVoChong', 'NgheNghiepVoChong', '[NgheNghiepVoChong]', 202, -1, FALSE, '[NgheNghiepVoChong]', FALSE);
		$this->fields['NgheNghiepVoChong'] =& $this->NgheNghiepVoChong;

		// DienThoaiVoChong
		$this->DienThoaiVoChong = new cField('NhanVien', 'NhanVien', 'x_DienThoaiVoChong', 'DienThoaiVoChong', '[DienThoaiVoChong]', 202, -1, FALSE, '[DienThoaiVoChong]', FALSE);
		$this->fields['DienThoaiVoChong'] =& $this->DienThoaiVoChong;

		// HinhAnhNhanVien
		$this->HinhAnhNhanVien = new cField('NhanVien', 'NhanVien', 'x_HinhAnhNhanVien', 'HinhAnhNhanVien', '[HinhAnhNhanVien]', 205, -1, TRUE, '[HinhAnhNhanVien]', FALSE);
		$this->fields['HinhAnhNhanVien'] =& $this->HinhAnhNhanVien;

		// Ho
		$this->Ho = new cField('NhanVien', 'NhanVien', 'x_Ho', 'Ho', '[Ho]', 202, -1, FALSE, '[Ho]', FALSE);
		$this->fields['Ho'] =& $this->Ho;

		// Ten
		$this->Ten = new cField('NhanVien', 'NhanVien', 'x_Ten', 'Ten', '[Ten]', 202, -1, FALSE, '[Ten]', FALSE);
		$this->fields['Ten'] =& $this->Ten;

		// LoaiHopDong
		$this->LoaiHopDong = new cField('NhanVien', 'NhanVien', 'x_LoaiHopDong', 'LoaiHopDong', '[LoaiHopDong]', 202, -1, FALSE, '[LoaiHopDong]', FALSE);
		$this->fields['LoaiHopDong'] =& $this->LoaiHopDong;
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
		return "NhanVien_Highlight";
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

	// Single column sort
	function UpdateSort(&$ofld) {
		if ($this->CurrentOrder == $ofld->FldName) {
			$sSortField = $ofld->FldExpression;
			$sLastSort = $ofld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$sThisSort = $this->CurrentOrderType;
			} else {
				$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			}
			$ofld->setSort($sThisSort);
			$this->setSessionOrderBy($sSortField . " " . $sThisSort); // Save to Session
		} else {
			$ofld->setSort("");
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
		return "[dbo].[NhanVien]";
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
		return "INSERT INTO [dbo].[NhanVien] ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE [dbo].[NhanVien] SET ";
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
		$SQL = "DELETE FROM [dbo].[NhanVien] WHERE ";
		$SQL .= ew_QuotedName('NhanVienID') . '=' . ew_QuotedValue($rs['NhanVienID'], $this->NhanVienID->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "[NhanVienID] = @NhanVienID@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->NhanVienID->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@NhanVienID@", ew_AdjustSql($this->NhanVienID->CurrentValue), $sKeyFilter); // Replace key value
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
			return "NhanVienlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "NhanVienlist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("NhanVienview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "NhanVienadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit URL
	function EditUrl() {
		return $this->KeyUrl("NhanVienedit.php", $this->UrlParm());
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl() {
		return $this->KeyUrl("NhanVienadd.php", $this->UrlParm());
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("NhanViendelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->NhanVienID->CurrentValue)) {
			$sUrl .= "NhanVienID=" . urlencode($this->NhanVienID->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=NhanVien" : "";
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
		$this->NhanVienID->setDbValue($rs->fields('NhanVienID'));
		$this->HoTen->setDbValue($rs->fields('HoTen'));
		$this->NgaySinh->setDbValue($rs->fields('NgaySinh'));
		$this->GioiTinh->setDbValue((ew_ConvertToBool($rs->fields('GioiTinh'))) ? "1" : "0");
		$this->DanToc->setDbValue($rs->fields('DanToc'));
		$this->TonGiao->setDbValue($rs->fields('TonGiao'));
		$this->SoCMND->setDbValue($rs->fields('SoCMND'));
		$this->NgayCapCMND->setDbValue($rs->fields('NgayCapCMND'));
		$this->NoiCapCMND->setDbValue($rs->fields('NoiCapCMND'));
		$this->DiaChi->setDbValue($rs->fields('DiaChi'));
		$this->DienThoai->setDbValue($rs->fields('DienThoai'));
		$this->zEmail->setDbValue($rs->fields('Email'));
		$this->IsGiaoVien->setDbValue((ew_ConvertToBool($rs->fields('IsGiaoVien'))) ? "1" : "0");
		$this->ChucVuID->setDbValue($rs->fields('ChucVuID'));
		$this->TrinhDoID->setDbValue($rs->fields('TrinhDoID'));
		$this->BacLuong->setDbValue($rs->fields('BacLuong'));
		$this->HeSoLuong->setDbValue($rs->fields('HeSoLuong'));
		$this->LuongCoBan->setDbValue($rs->fields('LuongCoBan'));
		$this->LuongNgay->setDbValue($rs->fields('LuongNgay'));
		$this->NgayNangLuong->setDbValue($rs->fields('NgayNangLuong'));
		$this->NgayVaoLamViec->setDbValue($rs->fields('NgayVaoLamViec'));
		$this->DaNghiViec->setDbValue((ew_ConvertToBool($rs->fields('DaNghiViec'))) ? "1" : "0");
		$this->NgayNghiViec->setDbValue($rs->fields('NgayNghiViec'));
		$this->IsDangVien->setDbValue((ew_ConvertToBool($rs->fields('IsDangVien'))) ? "1" : "0");
		$this->NgayVaoDang->setDbValue($rs->fields('NgayVaoDang'));
		$this->SoTheDang->setDbValue($rs->fields('SoTheDang'));
		$this->ThanhPhanGiaDinh->setDbValue($rs->fields('ThanhPhanGiaDinh'));
		$this->HoTenCha->setDbValue($rs->fields('HoTenCha'));
		$this->NamSinhCha->setDbValue($rs->fields('NamSinhCha'));
		$this->NgheNghiepCha->setDbValue($rs->fields('NgheNghiepCha'));
		$this->HoTenMe->setDbValue($rs->fields('HoTenMe'));
		$this->NamSinhMe->setDbValue($rs->fields('NamSinhMe'));
		$this->NgheNghiepMe->setDbValue($rs->fields('NgheNghiepMe'));
		$this->DiaChiChaMe->setDbValue($rs->fields('DiaChiChaMe'));
		$this->DienThoaiChaMe->setDbValue($rs->fields('DienThoaiChaMe'));
		$this->HoTenVoChong->setDbValue($rs->fields('HoTenVoChong'));
		$this->NamSinhVoChong->setDbValue($rs->fields('NamSinhVoChong'));
		$this->NgheNghiepVoChong->setDbValue($rs->fields('NgheNghiepVoChong'));
		$this->DienThoaiVoChong->setDbValue($rs->fields('DienThoaiVoChong'));
		$this->HinhAnhNhanVien->Upload->DbValue = $rs->fields('HinhAnhNhanVien');
		$this->Ho->setDbValue($rs->fields('Ho'));
		$this->Ten->setDbValue($rs->fields('Ten'));
		$this->LoaiHopDong->setDbValue($rs->fields('LoaiHopDong'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// NhanVienID

		$this->NhanVienID->CellCssStyle = ""; $this->NhanVienID->CellCssClass = "";
		$this->NhanVienID->CellAttrs = array(); $this->NhanVienID->ViewAttrs = array(); $this->NhanVienID->EditAttrs = array();

		// HoTen
		$this->HoTen->CellCssStyle = ""; $this->HoTen->CellCssClass = "";
		$this->HoTen->CellAttrs = array(); $this->HoTen->ViewAttrs = array(); $this->HoTen->EditAttrs = array();

		// NgaySinh
		$this->NgaySinh->CellCssStyle = ""; $this->NgaySinh->CellCssClass = "";
		$this->NgaySinh->CellAttrs = array(); $this->NgaySinh->ViewAttrs = array(); $this->NgaySinh->EditAttrs = array();

		// GioiTinh
		$this->GioiTinh->CellCssStyle = ""; $this->GioiTinh->CellCssClass = "";
		$this->GioiTinh->CellAttrs = array(); $this->GioiTinh->ViewAttrs = array(); $this->GioiTinh->EditAttrs = array();

		// DanToc
		$this->DanToc->CellCssStyle = ""; $this->DanToc->CellCssClass = "";
		$this->DanToc->CellAttrs = array(); $this->DanToc->ViewAttrs = array(); $this->DanToc->EditAttrs = array();

		// TonGiao
		$this->TonGiao->CellCssStyle = ""; $this->TonGiao->CellCssClass = "";
		$this->TonGiao->CellAttrs = array(); $this->TonGiao->ViewAttrs = array(); $this->TonGiao->EditAttrs = array();

		// SoCMND
		$this->SoCMND->CellCssStyle = ""; $this->SoCMND->CellCssClass = "";
		$this->SoCMND->CellAttrs = array(); $this->SoCMND->ViewAttrs = array(); $this->SoCMND->EditAttrs = array();

		// NgayCapCMND
		$this->NgayCapCMND->CellCssStyle = ""; $this->NgayCapCMND->CellCssClass = "";
		$this->NgayCapCMND->CellAttrs = array(); $this->NgayCapCMND->ViewAttrs = array(); $this->NgayCapCMND->EditAttrs = array();

		// NoiCapCMND
		$this->NoiCapCMND->CellCssStyle = ""; $this->NoiCapCMND->CellCssClass = "";
		$this->NoiCapCMND->CellAttrs = array(); $this->NoiCapCMND->ViewAttrs = array(); $this->NoiCapCMND->EditAttrs = array();

		// DiaChi
		$this->DiaChi->CellCssStyle = ""; $this->DiaChi->CellCssClass = "";
		$this->DiaChi->CellAttrs = array(); $this->DiaChi->ViewAttrs = array(); $this->DiaChi->EditAttrs = array();

		// DienThoai
		$this->DienThoai->CellCssStyle = ""; $this->DienThoai->CellCssClass = "";
		$this->DienThoai->CellAttrs = array(); $this->DienThoai->ViewAttrs = array(); $this->DienThoai->EditAttrs = array();

		// Email
		$this->zEmail->CellCssStyle = ""; $this->zEmail->CellCssClass = "";
		$this->zEmail->CellAttrs = array(); $this->zEmail->ViewAttrs = array(); $this->zEmail->EditAttrs = array();

		// IsGiaoVien
		$this->IsGiaoVien->CellCssStyle = ""; $this->IsGiaoVien->CellCssClass = "";
		$this->IsGiaoVien->CellAttrs = array(); $this->IsGiaoVien->ViewAttrs = array(); $this->IsGiaoVien->EditAttrs = array();

		// ChucVuID
		$this->ChucVuID->CellCssStyle = ""; $this->ChucVuID->CellCssClass = "";
		$this->ChucVuID->CellAttrs = array(); $this->ChucVuID->ViewAttrs = array(); $this->ChucVuID->EditAttrs = array();

		// TrinhDoID
		$this->TrinhDoID->CellCssStyle = ""; $this->TrinhDoID->CellCssClass = "";
		$this->TrinhDoID->CellAttrs = array(); $this->TrinhDoID->ViewAttrs = array(); $this->TrinhDoID->EditAttrs = array();

		// BacLuong
		$this->BacLuong->CellCssStyle = ""; $this->BacLuong->CellCssClass = "";
		$this->BacLuong->CellAttrs = array(); $this->BacLuong->ViewAttrs = array(); $this->BacLuong->EditAttrs = array();

		// HeSoLuong
		$this->HeSoLuong->CellCssStyle = ""; $this->HeSoLuong->CellCssClass = "";
		$this->HeSoLuong->CellAttrs = array(); $this->HeSoLuong->ViewAttrs = array(); $this->HeSoLuong->EditAttrs = array();

		// LuongCoBan
		$this->LuongCoBan->CellCssStyle = ""; $this->LuongCoBan->CellCssClass = "";
		$this->LuongCoBan->CellAttrs = array(); $this->LuongCoBan->ViewAttrs = array(); $this->LuongCoBan->EditAttrs = array();

		// LuongNgay
		$this->LuongNgay->CellCssStyle = ""; $this->LuongNgay->CellCssClass = "";
		$this->LuongNgay->CellAttrs = array(); $this->LuongNgay->ViewAttrs = array(); $this->LuongNgay->EditAttrs = array();

		// NgayNangLuong
		$this->NgayNangLuong->CellCssStyle = ""; $this->NgayNangLuong->CellCssClass = "";
		$this->NgayNangLuong->CellAttrs = array(); $this->NgayNangLuong->ViewAttrs = array(); $this->NgayNangLuong->EditAttrs = array();

		// NgayVaoLamViec
		$this->NgayVaoLamViec->CellCssStyle = ""; $this->NgayVaoLamViec->CellCssClass = "";
		$this->NgayVaoLamViec->CellAttrs = array(); $this->NgayVaoLamViec->ViewAttrs = array(); $this->NgayVaoLamViec->EditAttrs = array();

		// DaNghiViec
		$this->DaNghiViec->CellCssStyle = ""; $this->DaNghiViec->CellCssClass = "";
		$this->DaNghiViec->CellAttrs = array(); $this->DaNghiViec->ViewAttrs = array(); $this->DaNghiViec->EditAttrs = array();

		// NgayNghiViec
		$this->NgayNghiViec->CellCssStyle = ""; $this->NgayNghiViec->CellCssClass = "";
		$this->NgayNghiViec->CellAttrs = array(); $this->NgayNghiViec->ViewAttrs = array(); $this->NgayNghiViec->EditAttrs = array();

		// IsDangVien
		$this->IsDangVien->CellCssStyle = ""; $this->IsDangVien->CellCssClass = "";
		$this->IsDangVien->CellAttrs = array(); $this->IsDangVien->ViewAttrs = array(); $this->IsDangVien->EditAttrs = array();

		// NgayVaoDang
		$this->NgayVaoDang->CellCssStyle = ""; $this->NgayVaoDang->CellCssClass = "";
		$this->NgayVaoDang->CellAttrs = array(); $this->NgayVaoDang->ViewAttrs = array(); $this->NgayVaoDang->EditAttrs = array();

		// SoTheDang
		$this->SoTheDang->CellCssStyle = ""; $this->SoTheDang->CellCssClass = "";
		$this->SoTheDang->CellAttrs = array(); $this->SoTheDang->ViewAttrs = array(); $this->SoTheDang->EditAttrs = array();

		// ThanhPhanGiaDinh
		$this->ThanhPhanGiaDinh->CellCssStyle = ""; $this->ThanhPhanGiaDinh->CellCssClass = "";
		$this->ThanhPhanGiaDinh->CellAttrs = array(); $this->ThanhPhanGiaDinh->ViewAttrs = array(); $this->ThanhPhanGiaDinh->EditAttrs = array();

		// HoTenCha
		$this->HoTenCha->CellCssStyle = ""; $this->HoTenCha->CellCssClass = "";
		$this->HoTenCha->CellAttrs = array(); $this->HoTenCha->ViewAttrs = array(); $this->HoTenCha->EditAttrs = array();

		// NamSinhCha
		$this->NamSinhCha->CellCssStyle = ""; $this->NamSinhCha->CellCssClass = "";
		$this->NamSinhCha->CellAttrs = array(); $this->NamSinhCha->ViewAttrs = array(); $this->NamSinhCha->EditAttrs = array();

		// NgheNghiepCha
		$this->NgheNghiepCha->CellCssStyle = ""; $this->NgheNghiepCha->CellCssClass = "";
		$this->NgheNghiepCha->CellAttrs = array(); $this->NgheNghiepCha->ViewAttrs = array(); $this->NgheNghiepCha->EditAttrs = array();

		// HoTenMe
		$this->HoTenMe->CellCssStyle = ""; $this->HoTenMe->CellCssClass = "";
		$this->HoTenMe->CellAttrs = array(); $this->HoTenMe->ViewAttrs = array(); $this->HoTenMe->EditAttrs = array();

		// NamSinhMe
		$this->NamSinhMe->CellCssStyle = ""; $this->NamSinhMe->CellCssClass = "";
		$this->NamSinhMe->CellAttrs = array(); $this->NamSinhMe->ViewAttrs = array(); $this->NamSinhMe->EditAttrs = array();

		// NgheNghiepMe
		$this->NgheNghiepMe->CellCssStyle = ""; $this->NgheNghiepMe->CellCssClass = "";
		$this->NgheNghiepMe->CellAttrs = array(); $this->NgheNghiepMe->ViewAttrs = array(); $this->NgheNghiepMe->EditAttrs = array();

		// DiaChiChaMe
		$this->DiaChiChaMe->CellCssStyle = ""; $this->DiaChiChaMe->CellCssClass = "";
		$this->DiaChiChaMe->CellAttrs = array(); $this->DiaChiChaMe->ViewAttrs = array(); $this->DiaChiChaMe->EditAttrs = array();

		// DienThoaiChaMe
		$this->DienThoaiChaMe->CellCssStyle = ""; $this->DienThoaiChaMe->CellCssClass = "";
		$this->DienThoaiChaMe->CellAttrs = array(); $this->DienThoaiChaMe->ViewAttrs = array(); $this->DienThoaiChaMe->EditAttrs = array();

		// HoTenVoChong
		$this->HoTenVoChong->CellCssStyle = ""; $this->HoTenVoChong->CellCssClass = "";
		$this->HoTenVoChong->CellAttrs = array(); $this->HoTenVoChong->ViewAttrs = array(); $this->HoTenVoChong->EditAttrs = array();

		// NamSinhVoChong
		$this->NamSinhVoChong->CellCssStyle = ""; $this->NamSinhVoChong->CellCssClass = "";
		$this->NamSinhVoChong->CellAttrs = array(); $this->NamSinhVoChong->ViewAttrs = array(); $this->NamSinhVoChong->EditAttrs = array();

		// NgheNghiepVoChong
		$this->NgheNghiepVoChong->CellCssStyle = ""; $this->NgheNghiepVoChong->CellCssClass = "";
		$this->NgheNghiepVoChong->CellAttrs = array(); $this->NgheNghiepVoChong->ViewAttrs = array(); $this->NgheNghiepVoChong->EditAttrs = array();

		// DienThoaiVoChong
		$this->DienThoaiVoChong->CellCssStyle = ""; $this->DienThoaiVoChong->CellCssClass = "";
		$this->DienThoaiVoChong->CellAttrs = array(); $this->DienThoaiVoChong->ViewAttrs = array(); $this->DienThoaiVoChong->EditAttrs = array();

		// Ho
		$this->Ho->CellCssStyle = ""; $this->Ho->CellCssClass = "";
		$this->Ho->CellAttrs = array(); $this->Ho->ViewAttrs = array(); $this->Ho->EditAttrs = array();

		// Ten
		$this->Ten->CellCssStyle = ""; $this->Ten->CellCssClass = "";
		$this->Ten->CellAttrs = array(); $this->Ten->ViewAttrs = array(); $this->Ten->EditAttrs = array();

		// LoaiHopDong
		$this->LoaiHopDong->CellCssStyle = ""; $this->LoaiHopDong->CellCssClass = "";
		$this->LoaiHopDong->CellAttrs = array(); $this->LoaiHopDong->ViewAttrs = array(); $this->LoaiHopDong->EditAttrs = array();

		// NhanVienID
		$this->NhanVienID->ViewValue = $this->NhanVienID->CurrentValue;
		$this->NhanVienID->CssStyle = "";
		$this->NhanVienID->CssClass = "";
		$this->NhanVienID->ViewCustomAttributes = "";

		// HoTen
		$this->HoTen->ViewValue = $this->HoTen->CurrentValue;
		$this->HoTen->CssStyle = "";
		$this->HoTen->CssClass = "";
		$this->HoTen->ViewCustomAttributes = "";

		// NgaySinh
		$this->NgaySinh->ViewValue = $this->NgaySinh->CurrentValue;
		$this->NgaySinh->ViewValue = ew_FormatDateTime($this->NgaySinh->ViewValue, 5);
		$this->NgaySinh->CssStyle = "";
		$this->NgaySinh->CssClass = "";
		$this->NgaySinh->ViewCustomAttributes = "";

		// GioiTinh
		if (ew_ConvertToBool($this->GioiTinh->CurrentValue)) {
			$this->GioiTinh->ViewValue = "Yes";
		} else {
			$this->GioiTinh->ViewValue = "No";
		}
		$this->GioiTinh->CssStyle = "";
		$this->GioiTinh->CssClass = "";
		$this->GioiTinh->ViewCustomAttributes = "";

		// DanToc
		$this->DanToc->ViewValue = $this->DanToc->CurrentValue;
		$this->DanToc->CssStyle = "";
		$this->DanToc->CssClass = "";
		$this->DanToc->ViewCustomAttributes = "";

		// TonGiao
		$this->TonGiao->ViewValue = $this->TonGiao->CurrentValue;
		$this->TonGiao->CssStyle = "";
		$this->TonGiao->CssClass = "";
		$this->TonGiao->ViewCustomAttributes = "";

		// SoCMND
		$this->SoCMND->ViewValue = $this->SoCMND->CurrentValue;
		$this->SoCMND->CssStyle = "";
		$this->SoCMND->CssClass = "";
		$this->SoCMND->ViewCustomAttributes = "";

		// NgayCapCMND
		$this->NgayCapCMND->ViewValue = $this->NgayCapCMND->CurrentValue;
		$this->NgayCapCMND->CssStyle = "";
		$this->NgayCapCMND->CssClass = "";
		$this->NgayCapCMND->ViewCustomAttributes = "";

		// NoiCapCMND
		$this->NoiCapCMND->ViewValue = $this->NoiCapCMND->CurrentValue;
		$this->NoiCapCMND->CssStyle = "";
		$this->NoiCapCMND->CssClass = "";
		$this->NoiCapCMND->ViewCustomAttributes = "";

		// DiaChi
		$this->DiaChi->ViewValue = $this->DiaChi->CurrentValue;
		$this->DiaChi->CssStyle = "";
		$this->DiaChi->CssClass = "";
		$this->DiaChi->ViewCustomAttributes = "";

		// DienThoai
		$this->DienThoai->ViewValue = $this->DienThoai->CurrentValue;
		$this->DienThoai->CssStyle = "";
		$this->DienThoai->CssClass = "";
		$this->DienThoai->ViewCustomAttributes = "";

		// Email
		$this->zEmail->ViewValue = $this->zEmail->CurrentValue;
		$this->zEmail->CssStyle = "";
		$this->zEmail->CssClass = "";
		$this->zEmail->ViewCustomAttributes = "";

		// IsGiaoVien
		if (ew_ConvertToBool($this->IsGiaoVien->CurrentValue)) {
			$this->IsGiaoVien->ViewValue = "Yes";
		} else {
			$this->IsGiaoVien->ViewValue = "No";
		}
		$this->IsGiaoVien->CssStyle = "";
		$this->IsGiaoVien->CssClass = "";
		$this->IsGiaoVien->ViewCustomAttributes = "";

		// ChucVuID
		$this->ChucVuID->ViewValue = $this->ChucVuID->CurrentValue;
		$this->ChucVuID->CssStyle = "";
		$this->ChucVuID->CssClass = "";
		$this->ChucVuID->ViewCustomAttributes = "";

		// TrinhDoID
		$this->TrinhDoID->ViewValue = $this->TrinhDoID->CurrentValue;
		$this->TrinhDoID->CssStyle = "";
		$this->TrinhDoID->CssClass = "";
		$this->TrinhDoID->ViewCustomAttributes = "";

		// BacLuong
		$this->BacLuong->ViewValue = $this->BacLuong->CurrentValue;
		$this->BacLuong->CssStyle = "";
		$this->BacLuong->CssClass = "";
		$this->BacLuong->ViewCustomAttributes = "";

		// HeSoLuong
		$this->HeSoLuong->ViewValue = $this->HeSoLuong->CurrentValue;
		$this->HeSoLuong->CssStyle = "";
		$this->HeSoLuong->CssClass = "";
		$this->HeSoLuong->ViewCustomAttributes = "";

		// LuongCoBan
		$this->LuongCoBan->ViewValue = $this->LuongCoBan->CurrentValue;
		$this->LuongCoBan->CssStyle = "";
		$this->LuongCoBan->CssClass = "";
		$this->LuongCoBan->ViewCustomAttributes = "";

		// LuongNgay
		$this->LuongNgay->ViewValue = $this->LuongNgay->CurrentValue;
		$this->LuongNgay->CssStyle = "";
		$this->LuongNgay->CssClass = "";
		$this->LuongNgay->ViewCustomAttributes = "";

		// NgayNangLuong
		$this->NgayNangLuong->ViewValue = $this->NgayNangLuong->CurrentValue;
		$this->NgayNangLuong->CssStyle = "";
		$this->NgayNangLuong->CssClass = "";
		$this->NgayNangLuong->ViewCustomAttributes = "";

		// NgayVaoLamViec
		$this->NgayVaoLamViec->ViewValue = $this->NgayVaoLamViec->CurrentValue;
		$this->NgayVaoLamViec->ViewValue = ew_FormatDateTime($this->NgayVaoLamViec->ViewValue, 5);
		$this->NgayVaoLamViec->CssStyle = "";
		$this->NgayVaoLamViec->CssClass = "";
		$this->NgayVaoLamViec->ViewCustomAttributes = "";

		// DaNghiViec
		if (ew_ConvertToBool($this->DaNghiViec->CurrentValue)) {
			$this->DaNghiViec->ViewValue = "Yes";
		} else {
			$this->DaNghiViec->ViewValue = "No";
		}
		$this->DaNghiViec->CssStyle = "";
		$this->DaNghiViec->CssClass = "";
		$this->DaNghiViec->ViewCustomAttributes = "";

		// NgayNghiViec
		$this->NgayNghiViec->ViewValue = $this->NgayNghiViec->CurrentValue;
		$this->NgayNghiViec->ViewValue = ew_FormatDateTime($this->NgayNghiViec->ViewValue, 5);
		$this->NgayNghiViec->CssStyle = "";
		$this->NgayNghiViec->CssClass = "";
		$this->NgayNghiViec->ViewCustomAttributes = "";

		// IsDangVien
		if (ew_ConvertToBool($this->IsDangVien->CurrentValue)) {
			$this->IsDangVien->ViewValue = "Yes";
		} else {
			$this->IsDangVien->ViewValue = "No";
		}
		$this->IsDangVien->CssStyle = "";
		$this->IsDangVien->CssClass = "";
		$this->IsDangVien->ViewCustomAttributes = "";

		// NgayVaoDang
		$this->NgayVaoDang->ViewValue = $this->NgayVaoDang->CurrentValue;
		$this->NgayVaoDang->CssStyle = "";
		$this->NgayVaoDang->CssClass = "";
		$this->NgayVaoDang->ViewCustomAttributes = "";

		// SoTheDang
		$this->SoTheDang->ViewValue = $this->SoTheDang->CurrentValue;
		$this->SoTheDang->CssStyle = "";
		$this->SoTheDang->CssClass = "";
		$this->SoTheDang->ViewCustomAttributes = "";

		// ThanhPhanGiaDinh
		$this->ThanhPhanGiaDinh->ViewValue = $this->ThanhPhanGiaDinh->CurrentValue;
		$this->ThanhPhanGiaDinh->CssStyle = "";
		$this->ThanhPhanGiaDinh->CssClass = "";
		$this->ThanhPhanGiaDinh->ViewCustomAttributes = "";

		// HoTenCha
		$this->HoTenCha->ViewValue = $this->HoTenCha->CurrentValue;
		$this->HoTenCha->CssStyle = "";
		$this->HoTenCha->CssClass = "";
		$this->HoTenCha->ViewCustomAttributes = "";

		// NamSinhCha
		$this->NamSinhCha->ViewValue = $this->NamSinhCha->CurrentValue;
		$this->NamSinhCha->CssStyle = "";
		$this->NamSinhCha->CssClass = "";
		$this->NamSinhCha->ViewCustomAttributes = "";

		// NgheNghiepCha
		$this->NgheNghiepCha->ViewValue = $this->NgheNghiepCha->CurrentValue;
		$this->NgheNghiepCha->CssStyle = "";
		$this->NgheNghiepCha->CssClass = "";
		$this->NgheNghiepCha->ViewCustomAttributes = "";

		// HoTenMe
		$this->HoTenMe->ViewValue = $this->HoTenMe->CurrentValue;
		$this->HoTenMe->CssStyle = "";
		$this->HoTenMe->CssClass = "";
		$this->HoTenMe->ViewCustomAttributes = "";

		// NamSinhMe
		$this->NamSinhMe->ViewValue = $this->NamSinhMe->CurrentValue;
		$this->NamSinhMe->CssStyle = "";
		$this->NamSinhMe->CssClass = "";
		$this->NamSinhMe->ViewCustomAttributes = "";

		// NgheNghiepMe
		$this->NgheNghiepMe->ViewValue = $this->NgheNghiepMe->CurrentValue;
		$this->NgheNghiepMe->CssStyle = "";
		$this->NgheNghiepMe->CssClass = "";
		$this->NgheNghiepMe->ViewCustomAttributes = "";

		// DiaChiChaMe
		$this->DiaChiChaMe->ViewValue = $this->DiaChiChaMe->CurrentValue;
		$this->DiaChiChaMe->CssStyle = "";
		$this->DiaChiChaMe->CssClass = "";
		$this->DiaChiChaMe->ViewCustomAttributes = "";

		// DienThoaiChaMe
		$this->DienThoaiChaMe->ViewValue = $this->DienThoaiChaMe->CurrentValue;
		$this->DienThoaiChaMe->CssStyle = "";
		$this->DienThoaiChaMe->CssClass = "";
		$this->DienThoaiChaMe->ViewCustomAttributes = "";

		// HoTenVoChong
		$this->HoTenVoChong->ViewValue = $this->HoTenVoChong->CurrentValue;
		$this->HoTenVoChong->CssStyle = "";
		$this->HoTenVoChong->CssClass = "";
		$this->HoTenVoChong->ViewCustomAttributes = "";

		// NamSinhVoChong
		$this->NamSinhVoChong->ViewValue = $this->NamSinhVoChong->CurrentValue;
		$this->NamSinhVoChong->CssStyle = "";
		$this->NamSinhVoChong->CssClass = "";
		$this->NamSinhVoChong->ViewCustomAttributes = "";

		// NgheNghiepVoChong
		$this->NgheNghiepVoChong->ViewValue = $this->NgheNghiepVoChong->CurrentValue;
		$this->NgheNghiepVoChong->CssStyle = "";
		$this->NgheNghiepVoChong->CssClass = "";
		$this->NgheNghiepVoChong->ViewCustomAttributes = "";

		// DienThoaiVoChong
		$this->DienThoaiVoChong->ViewValue = $this->DienThoaiVoChong->CurrentValue;
		$this->DienThoaiVoChong->CssStyle = "";
		$this->DienThoaiVoChong->CssClass = "";
		$this->DienThoaiVoChong->ViewCustomAttributes = "";

		// Ho
		$this->Ho->ViewValue = $this->Ho->CurrentValue;
		$this->Ho->CssStyle = "";
		$this->Ho->CssClass = "";
		$this->Ho->ViewCustomAttributes = "";

		// Ten
		$this->Ten->ViewValue = $this->Ten->CurrentValue;
		$this->Ten->CssStyle = "";
		$this->Ten->CssClass = "";
		$this->Ten->ViewCustomAttributes = "";

		// LoaiHopDong
		$this->LoaiHopDong->ViewValue = $this->LoaiHopDong->CurrentValue;
		$this->LoaiHopDong->CssStyle = "";
		$this->LoaiHopDong->CssClass = "";
		$this->LoaiHopDong->ViewCustomAttributes = "";

		// NhanVienID
		$this->NhanVienID->HrefValue = "";
		$this->NhanVienID->TooltipValue = "";

		// HoTen
		$this->HoTen->HrefValue = "";
		$this->HoTen->TooltipValue = "";

		// NgaySinh
		$this->NgaySinh->HrefValue = "";
		$this->NgaySinh->TooltipValue = "";

		// GioiTinh
		$this->GioiTinh->HrefValue = "";
		$this->GioiTinh->TooltipValue = "";

		// DanToc
		$this->DanToc->HrefValue = "";
		$this->DanToc->TooltipValue = "";

		// TonGiao
		$this->TonGiao->HrefValue = "";
		$this->TonGiao->TooltipValue = "";

		// SoCMND
		$this->SoCMND->HrefValue = "";
		$this->SoCMND->TooltipValue = "";

		// NgayCapCMND
		$this->NgayCapCMND->HrefValue = "";
		$this->NgayCapCMND->TooltipValue = "";

		// NoiCapCMND
		$this->NoiCapCMND->HrefValue = "";
		$this->NoiCapCMND->TooltipValue = "";

		// DiaChi
		$this->DiaChi->HrefValue = "";
		$this->DiaChi->TooltipValue = "";

		// DienThoai
		$this->DienThoai->HrefValue = "";
		$this->DienThoai->TooltipValue = "";

		// Email
		$this->zEmail->HrefValue = "";
		$this->zEmail->TooltipValue = "";

		// IsGiaoVien
		$this->IsGiaoVien->HrefValue = "";
		$this->IsGiaoVien->TooltipValue = "";

		// ChucVuID
		$this->ChucVuID->HrefValue = "";
		$this->ChucVuID->TooltipValue = "";

		// TrinhDoID
		$this->TrinhDoID->HrefValue = "";
		$this->TrinhDoID->TooltipValue = "";

		// BacLuong
		$this->BacLuong->HrefValue = "";
		$this->BacLuong->TooltipValue = "";

		// HeSoLuong
		$this->HeSoLuong->HrefValue = "";
		$this->HeSoLuong->TooltipValue = "";

		// LuongCoBan
		$this->LuongCoBan->HrefValue = "";
		$this->LuongCoBan->TooltipValue = "";

		// LuongNgay
		$this->LuongNgay->HrefValue = "";
		$this->LuongNgay->TooltipValue = "";

		// NgayNangLuong
		$this->NgayNangLuong->HrefValue = "";
		$this->NgayNangLuong->TooltipValue = "";

		// NgayVaoLamViec
		$this->NgayVaoLamViec->HrefValue = "";
		$this->NgayVaoLamViec->TooltipValue = "";

		// DaNghiViec
		$this->DaNghiViec->HrefValue = "";
		$this->DaNghiViec->TooltipValue = "";

		// NgayNghiViec
		$this->NgayNghiViec->HrefValue = "";
		$this->NgayNghiViec->TooltipValue = "";

		// IsDangVien
		$this->IsDangVien->HrefValue = "";
		$this->IsDangVien->TooltipValue = "";

		// NgayVaoDang
		$this->NgayVaoDang->HrefValue = "";
		$this->NgayVaoDang->TooltipValue = "";

		// SoTheDang
		$this->SoTheDang->HrefValue = "";
		$this->SoTheDang->TooltipValue = "";

		// ThanhPhanGiaDinh
		$this->ThanhPhanGiaDinh->HrefValue = "";
		$this->ThanhPhanGiaDinh->TooltipValue = "";

		// HoTenCha
		$this->HoTenCha->HrefValue = "";
		$this->HoTenCha->TooltipValue = "";

		// NamSinhCha
		$this->NamSinhCha->HrefValue = "";
		$this->NamSinhCha->TooltipValue = "";

		// NgheNghiepCha
		$this->NgheNghiepCha->HrefValue = "";
		$this->NgheNghiepCha->TooltipValue = "";

		// HoTenMe
		$this->HoTenMe->HrefValue = "";
		$this->HoTenMe->TooltipValue = "";

		// NamSinhMe
		$this->NamSinhMe->HrefValue = "";
		$this->NamSinhMe->TooltipValue = "";

		// NgheNghiepMe
		$this->NgheNghiepMe->HrefValue = "";
		$this->NgheNghiepMe->TooltipValue = "";

		// DiaChiChaMe
		$this->DiaChiChaMe->HrefValue = "";
		$this->DiaChiChaMe->TooltipValue = "";

		// DienThoaiChaMe
		$this->DienThoaiChaMe->HrefValue = "";
		$this->DienThoaiChaMe->TooltipValue = "";

		// HoTenVoChong
		$this->HoTenVoChong->HrefValue = "";
		$this->HoTenVoChong->TooltipValue = "";

		// NamSinhVoChong
		$this->NamSinhVoChong->HrefValue = "";
		$this->NamSinhVoChong->TooltipValue = "";

		// NgheNghiepVoChong
		$this->NgheNghiepVoChong->HrefValue = "";
		$this->NgheNghiepVoChong->TooltipValue = "";

		// DienThoaiVoChong
		$this->DienThoaiVoChong->HrefValue = "";
		$this->DienThoaiVoChong->TooltipValue = "";

		// Ho
		$this->Ho->HrefValue = "";
		$this->Ho->TooltipValue = "";

		// Ten
		$this->Ten->HrefValue = "";
		$this->Ten->TooltipValue = "";

		// LoaiHopDong
		$this->LoaiHopDong->HrefValue = "";
		$this->LoaiHopDong->TooltipValue = "";

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
