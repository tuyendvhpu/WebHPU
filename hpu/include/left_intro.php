

           <div id="divnoidung">
                           <h2 class="h2title"> Giới thiệu</h2>
                           <ul class="ulcontents">
                            <?php 
                            $conn = ew_Connect();
                            $sSqlWrk = "Select * From t_danhmucgioithieu";
                            $sWhereWrk = "(t_danhmucgioithieu.C_ACTIVE = 1)";
                            if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                            $rswrk = $conn->Execute($sSqlWrk);
                            $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                            if ($rswrk) $rswrk->Close();   
                            for ($i=0;$i<count($arwrk);$i++)
                            { 
                            switch ($arwrk[$i]['C_TYPE'])
                            {
                                case 0:
                                    $sSql ="";$sWhere ="";
                                    $sSql = "SELECT PK_TINBAI_ID,C_TITLE,FK_DMGIOITHIEU_ID FROM t_tinbai_levelsite";
                                    $sWhere = "(t_tinbai_levelsite.FK_EDITOR_ID=-20) AND (t_tinbai_levelsite.FK_DMGIOITHIEU_ID  ='".$arwrk[$i]['PK_DANHMUCGIOITHIEU']."') LIMIT 1";
                                    if ($sWhere <> "") $sSql .= " WHERE $sWhere";
                                    $rs = $conn->Execute($sSql);
                                    //$url= "../tintuc/detailnews.php?sturl=gioithieu&pk_intro=".$arwrk[$i]['PK_DANHMUCGIOITHIEU']."&PK_TINBAI_ID=".$rs->fields['PK_TINBAI_ID'];
                                    $url ="../tintuc/HPUGTTT-".$rs->fields['FK_DMGIOITHIEU_ID']."-".$rs->fields['PK_TINBAI_ID']."-".changeTitle($rs->fields['C_TITLE']).".html";
                                    break;
                                case 1:
                                    $url= "../tintuc/HPUGT-".$arwrk[$i]['PK_DANHMUCGIOITHIEU']."-gioithieu.html";
                                  
                                break;
                            }
                            ?>
                             <li> <a href="<?php echo $url ?>"> <?php echo $arwrk[$i]['C_NAME'] ?></a> </li>
                            <?php } ?>
                           </ul>
                     </div>