  <table style="width:100%">
             <tr>
                 <td style="width: 50%">
                    
                 </td>
                 <td style="width: 50%">
                     <div id="search">
                         <form action="list_notice.php" id="searchForm" method="get">
                            <input id="txtsearch" name="s" value ="<?php echo KillChars(htmlspecialchars($_GET['s'])) ?>" type="text" placeholder="Tìm kiếm" />
                            <?php $url = "Doanthelich.html" ?>
                            <input id="inputsubmit" type="submit" style="" value="" />
                            <input type="hidden" id="t" name="t" value="Tìm kiếm thông báo"/>
                        </form>
                      <!-- end divsearch --></div> 
                 </td>
             </tr>
         </table>   