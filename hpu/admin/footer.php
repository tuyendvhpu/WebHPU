<?php if (@$gsExport == "") { ?>
<p>&nbsp;</p>
			<!-- right column (end) -->
			<?php if (isset($gsTimer)) $gsTimer->Stop() ?>
	    </td>
		</tr>
	</table>
	<!-- content (end) -->
	<!-- footer (begin) --><!-- *** Note: Only licensed users are allowed to remove or change the following copyright statement. *** -->
	 <div class="ewFooterRow">
             <div class="ewFooterText" style="text-align: center;font-size: 12px;">&nbsp;
                    Trường Đại học Dân lập Hải Phòng - Haiphong Private University <br/>
Địa chỉ: Số 36 - Đường Dân Lập - Phường Dư Hàng Kênh - Quận Lê Chân - TP Hải Phòng  <br/>
Điện thoại: 031 3740577 - 031 3833802 - 031 3740578 Fax: 031.3740476 Email: webmaster@hpu.edu.vn <br/>
Phát triển bởi Trung tâm Thông tin Thư viện 
                <tr><td bgcolor="#CCFFFF" align="center"><font color="#FFFFFF">
                    <?php echo $arwrk[0][0] ?></font></td>
		</tr>

                </div>
                <!-- Place other links, for example, disclaimer, here -->
        </div>
        <!-- footer (end) -->
</div>
<div class="yui-tt" id="ewTooltipDiv" style="visibility: hidden; border: 0px;" name="ewTooltipDivDiv"></div>
<?php } ?>
<script type="text/javascript">
<!--
<?php if (@$gsExport == "" || @$gsExport == "print") { ?>
ewDom.getElementsByClassName(EW_TABLE_CLASS, "TABLE", null, ew_SetupTable); // init the table
<?php } ?>
<?php if (@$gsExport == "") { ?>
ew_InitEmailDialog(); // Init the email dialog
<?php } ?>

//-->
</script>
<?php if (@$gsExport == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your global startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
</body>
</html>
