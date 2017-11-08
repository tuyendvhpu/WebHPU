  <table style="width:100%">
             <tr>
                 <td>
       <div id="search">
                         <form action="searchapigoogle.php" id="searchForm" method="get">
                            <input id="txtsearch" name="s" value ="<?php echo KillChars(htmlspecialchars($_GET['s'])) ?>" type="text" style=""  placeholder="Tìm kiếm" />
                            <input id="inputsubmit" type="submit" style="" value="" />
                            <input type="hidden" id="t" name="t" value="Tìm kiếm thông báo"/>
                        </form>
                      <!-- end divsearch --></div> 
                 </td>
                 <td style="text-align: right;width: 20px">
                         <?php include 'include/menu_main.php' ?>   
                 </td>
             </tr>
         </table>   