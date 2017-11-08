<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<style type="text/css" title="currentStyle">
                            @import "media/css/demo_page.css";
                            @import "media/css/demo_table.css";
                    </style>
                      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                    <script type="text/javascript"  src="media/js/jquery.js" ></script>
                    <script type="text/javascript"  src="media/js/jquery.dataTables.js"/></script>
                    <script type="text/javascript" charset="utf-8">
               


                    </script>
     <script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    var table = $('#example').DataTable();
 
    $('#example tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
 
    $('#button').click( function () {
        alert( table.rows('.selected').data().length +' row(s) selected' );
    } );
} );
                    </script>
 
 <div> <button id="button">Row count</button></div>                  
                    
                
<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Position</th>
                <th>Office</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Position</th>
                <th>Office</th>
            </tr>
        </tfoot>
 
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td><input id="row-1-age" name="row-1-age" value="61" type="text"></td>
                <td><input id="row-1-position" name="row-1-position" value="System Architect" type="text"></td>
                <td><select size="1" id="row-1-office" name="row-1-office">
                    <option value="Edinburgh" selected="selected">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td><input id="row-2-age" name="row-2-age" value="63" type="text"></td>
                <td><input id="row-2-position" name="row-2-position" value="Accountant" type="text"></td>
                <td><select size="1" id="row-2-office" name="row-2-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo" selected="selected">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td><input id="row-3-age" name="row-3-age" value="66" type="text"></td>
                <td><input id="row-3-position" name="row-3-position" value="Junior Technical Author" type="text"></td>
                <td><select size="1" id="row-3-office" name="row-3-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco" selected="selected">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td><input id="row-4-age" name="row-4-age" value="22" type="text"></td>
                <td><input id="row-4-position" name="row-4-position" value="Senior Javascript Developer" type="text"></td>
                <td><select size="1" id="row-4-office" name="row-4-office">
                    <option value="Edinburgh" selected="selected">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Airi Satou</td>
                <td><input id="row-5-age" name="row-5-age" value="33" type="text"></td>
                <td><input id="row-5-position" name="row-5-position" value="Accountant" type="text"></td>
                <td><select size="1" id="row-5-office" name="row-5-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo" selected="selected">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Brielle Williamson</td>
                <td><input id="row-6-age" name="row-6-age" value="61" type="text"></td>
                <td><input id="row-6-position" name="row-6-position" value="Integration Specialist" type="text"></td>
                <td><select size="1" id="row-6-office" name="row-6-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York" selected="selected">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Herrod Chandler</td>
                <td><input id="row-7-age" name="row-7-age" value="59" type="text"></td>
                <td><input id="row-7-position" name="row-7-position" value="Sales Assistant" type="text"></td>
                <td><select size="1" id="row-7-office" name="row-7-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco" selected="selected">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Rhona Davidson</td>
                <td><input id="row-8-age" name="row-8-age" value="55" type="text"></td>
                <td><input id="row-8-position" name="row-8-position" value="Integration Specialist" type="text"></td>
                <td><select size="1" id="row-8-office" name="row-8-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo" selected="selected">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Colleen Hurst</td>
                <td><input id="row-9-age" name="row-9-age" value="39" type="text"></td>
                <td><input id="row-9-position" name="row-9-position" value="Javascript Developer" type="text"></td>
                <td><select size="1" id="row-9-office" name="row-9-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco" selected="selected">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Sonya Frost</td>
                <td><input id="row-10-age" name="row-10-age" value="23" type="text"></td>
                <td><input id="row-10-position" name="row-10-position" value="Software Engineer" type="text"></td>
                <td><select size="1" id="row-10-office" name="row-10-office">
                    <option value="Edinburgh" selected="selected">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Jena Gaines</td>
                <td><input id="row-11-age" name="row-11-age" value="30" type="text"></td>
                <td><input id="row-11-position" name="row-11-position" value="Office Manager" type="text"></td>
                <td><select size="1" id="row-11-office" name="row-11-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London" selected="selected">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Quinn Flynn</td>
                <td><input id="row-12-age" name="row-12-age" value="22" type="text"></td>
                <td><input id="row-12-position" name="row-12-position" value="Support Lead" type="text"></td>
                <td><select size="1" id="row-12-office" name="row-12-office">
                    <option value="Edinburgh" selected="selected">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Charde Marshall</td>
                <td><input id="row-13-age" name="row-13-age" value="36" type="text"></td>
                <td><input id="row-13-position" name="row-13-position" value="Regional Director" type="text"></td>
                <td><select size="1" id="row-13-office" name="row-13-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco" selected="selected">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Haley Kennedy</td>
                <td><input id="row-14-age" name="row-14-age" value="43" type="text"></td>
                <td><input id="row-14-position" name="row-14-position" value="Senior Marketing Designer" type="text"></td>
                <td><select size="1" id="row-14-office" name="row-14-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London" selected="selected">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Tatyana Fitzpatrick</td>
                <td><input id="row-15-age" name="row-15-age" value="19" type="text"></td>
                <td><input id="row-15-position" name="row-15-position" value="Regional Director" type="text"></td>
                <td><select size="1" id="row-15-office" name="row-15-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London" selected="selected">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Michael Silva</td>
                <td><input id="row-16-age" name="row-16-age" value="66" type="text"></td>
                <td><input id="row-16-position" name="row-16-position" value="Marketing Designer" type="text"></td>
                <td><select size="1" id="row-16-office" name="row-16-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London" selected="selected">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Paul Byrd</td>
                <td><input id="row-17-age" name="row-17-age" value="64" type="text"></td>
                <td><input id="row-17-position" name="row-17-position" value="Chief Financial Officer (CFO)" type="text"></td>
                <td><select size="1" id="row-17-office" name="row-17-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York" selected="selected">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Gloria Little</td>
                <td><input id="row-18-age" name="row-18-age" value="59" type="text"></td>
                <td><input id="row-18-position" name="row-18-position" value="Systems Administrator" type="text"></td>
                <td><select size="1" id="row-18-office" name="row-18-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York" selected="selected">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Bradley Greer</td>
                <td><input id="row-19-age" name="row-19-age" value="41" type="text"></td>
                <td><input id="row-19-position" name="row-19-position" value="Software Engineer" type="text"></td>
                <td><select size="1" id="row-19-office" name="row-19-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London" selected="selected">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Dai Rios</td>
                <td><input id="row-20-age" name="row-20-age" value="35" type="text"></td>
                <td><input id="row-20-position" name="row-20-position" value="Personnel Lead" type="text"></td>
                <td><select size="1" id="row-20-office" name="row-20-office">
                    <option value="Edinburgh" selected="selected">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Jenette Caldwell</td>
                <td><input id="row-21-age" name="row-21-age" value="30" type="text"></td>
                <td><input id="row-21-position" name="row-21-position" value="Development Lead" type="text"></td>
                <td><select size="1" id="row-21-office" name="row-21-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York" selected="selected">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
            <tr>
                <td>Yuri Berry</td>
                <td><input id="row-22-age" name="row-22-age" value="40" type="text"></td>
                <td><input id="row-22-position" name="row-22-position" value="Chief Marketing Officer (CMO)" type="text"></td>
                <td><select size="1" id="row-22-office" name="row-22-office">
                    <option value="Edinburgh">
                        Edinburgh
                    </option>
 
                    <option value="London">
                        London
                    </option>
 
                    <option value="New York" selected="selected">
                        New York
                    </option>
 
                    <option value="San Francisco">
                        San Francisco
                    </option>
 
                    <option value="Tokyo">
                        Tokyo
                    </option>
                </select></td>
            </tr>
      </tbody>
    </table>