<?php

// Call Row_Rendering event
$t_nganhnghe->Row_Rendering();

// C_BELONGTO
$t_nganhnghe->C_BELONGTO->CellCssStyle = ""; $t_nganhnghe->C_BELONGTO->CellCssClass = "";
$t_nganhnghe->C_BELONGTO->CellAttrs = array(); $t_nganhnghe->C_BELONGTO->ViewAttrs = array(); $t_nganhnghe->C_BELONGTO->EditAttrs = array();

// C_TENNGANH
$t_nganhnghe->C_TENNGANH->CellCssStyle = ""; $t_nganhnghe->C_TENNGANH->CellCssClass = "";
$t_nganhnghe->C_TENNGANH->CellAttrs = array(); $t_nganhnghe->C_TENNGANH->ViewAttrs = array(); $t_nganhnghe->C_TENNGANH->EditAttrs = array();

// C_TRANGTHAI
$t_nganhnghe->C_TRANGTHAI->CellCssStyle = ""; $t_nganhnghe->C_TRANGTHAI->CellCssClass = "";
$t_nganhnghe->C_TRANGTHAI->CellAttrs = array(); $t_nganhnghe->C_TRANGTHAI->ViewAttrs = array(); $t_nganhnghe->C_TRANGTHAI->EditAttrs = array();

// C_USER_ADD
$t_nganhnghe->C_USER_ADD->CellCssStyle = ""; $t_nganhnghe->C_USER_ADD->CellCssClass = "";
$t_nganhnghe->C_USER_ADD->CellAttrs = array(); $t_nganhnghe->C_USER_ADD->ViewAttrs = array(); $t_nganhnghe->C_USER_ADD->EditAttrs = array();

// C_ADD_TIME
$t_nganhnghe->C_ADD_TIME->CellCssStyle = ""; $t_nganhnghe->C_ADD_TIME->CellCssClass = "";
$t_nganhnghe->C_ADD_TIME->CellAttrs = array(); $t_nganhnghe->C_ADD_TIME->ViewAttrs = array(); $t_nganhnghe->C_ADD_TIME->EditAttrs = array();

// C_USER_EDIT
$t_nganhnghe->C_USER_EDIT->CellCssStyle = ""; $t_nganhnghe->C_USER_EDIT->CellCssClass = "";
$t_nganhnghe->C_USER_EDIT->CellAttrs = array(); $t_nganhnghe->C_USER_EDIT->ViewAttrs = array(); $t_nganhnghe->C_USER_EDIT->EditAttrs = array();

// C_EDIT_TIME
$t_nganhnghe->C_EDIT_TIME->CellCssStyle = ""; $t_nganhnghe->C_EDIT_TIME->CellCssClass = "";
$t_nganhnghe->C_EDIT_TIME->CellAttrs = array(); $t_nganhnghe->C_EDIT_TIME->ViewAttrs = array(); $t_nganhnghe->C_EDIT_TIME->EditAttrs = array();

// Call Row_Rendered event
$t_nganhnghe->Row_Rendered();
?>
<p><span class="phpmaker"><?php echo $Language->Phrase("MasterRecord") ?><?php echo $t_nganhnghe->TableCaption() ?><br>
<a href="<?php echo $gsMasterReturnUrl ?>"><?php echo $Language->Phrase("BackToMasterPage") ?></a></span></p>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable ewTableSeparate">
	<thead>
		<tr>
			<td class="ewTableHeader"><?php echo $t_nganhnghe->C_BELONGTO->FldCaption() ?></td>
			<td class="ewTableHeader"><?php echo $t_nganhnghe->C_TENNGANH->FldCaption() ?></td>
			<td class="ewTableHeader"><?php echo $t_nganhnghe->C_TRANGTHAI->FldCaption() ?></td>
			<td class="ewTableHeader"><?php echo $t_nganhnghe->C_USER_ADD->FldCaption() ?></td>
			<td class="ewTableHeader"><?php echo $t_nganhnghe->C_ADD_TIME->FldCaption() ?></td>
			<td class="ewTableHeader"><?php echo $t_nganhnghe->C_USER_EDIT->FldCaption() ?></td>
			<td class="ewTableHeader"><?php echo $t_nganhnghe->C_EDIT_TIME->FldCaption() ?></td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td<?php echo $t_nganhnghe->C_BELONGTO->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_BELONGTO->ViewAttributes() ?>><?php echo $t_nganhnghe->C_BELONGTO->ListViewValue() ?></div></td>
			<td<?php echo $t_nganhnghe->C_TENNGANH->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_TENNGANH->ViewAttributes() ?>><?php echo $t_nganhnghe->C_TENNGANH->ListViewValue() ?></div></td>
			<td<?php echo $t_nganhnghe->C_TRANGTHAI->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_TRANGTHAI->ViewAttributes() ?>><?php echo $t_nganhnghe->C_TRANGTHAI->ListViewValue() ?></div></td>
			<td<?php echo $t_nganhnghe->C_USER_ADD->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_USER_ADD->ViewAttributes() ?>><?php echo $t_nganhnghe->C_USER_ADD->ListViewValue() ?></div></td>
			<td<?php echo $t_nganhnghe->C_ADD_TIME->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_ADD_TIME->ViewAttributes() ?>><?php echo $t_nganhnghe->C_ADD_TIME->ListViewValue() ?></div></td>
			<td<?php echo $t_nganhnghe->C_USER_EDIT->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_USER_EDIT->ViewAttributes() ?>><?php echo $t_nganhnghe->C_USER_EDIT->ListViewValue() ?></div></td>
			<td<?php echo $t_nganhnghe->C_EDIT_TIME->CellAttributes() ?>>
<div<?php echo $t_nganhnghe->C_EDIT_TIME->ViewAttributes() ?>><?php echo $t_nganhnghe->C_EDIT_TIME->ListViewValue() ?></div></td>
		</tr>
	</tbody>
</table>
</div>
</td></tr></table>
<br>
