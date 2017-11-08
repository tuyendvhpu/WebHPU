  <h2 class="h2title"> Đơn vị trong trường</h2>
                    <ul class="ulcontents">
                            <?PHP
                            $sSql ="";$sWhere ="";
                            $sSql = "SELECT * FROM t_congty";
                            $sWhere = "(C_REPORT_STATUS <> 1) ORDER BY FK_NGANH_ID";
                            if ($sWhere <> "") $sSql .= " WHERE $sWhere";
                            $rs = $conn->Execute($sSql);
                            $ar = ($rs) ? $rs->GetRows() : array();
                            if ($rs) $rs->Close();
                            $rows = count($ar);
                              for ($j=0;$j<$rows;$j++)
                               { 
                               $url_parent= $ar[$j]['C_WEBSITE'];     
                            ?>
                        <li> <a target="_blank" href="<?php echo $url_parent ?>"> <?php echo $ar[$j]['C_TENCONGTY']  ?></a> </li>
                             <?php } ?>
 </ul>