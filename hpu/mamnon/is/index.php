<?php

echo  phpinfo();
?>
<?php include "include/is_header.php" ?> 
<div id="wrapper">
<?php include "include/navbar.php" ?> 
  <div>

<?php
$sqlserver_hpu = new SqlServer_hpu; 
//--hungdq xac nhan so giang vien theo lop
$array = $sqlserver_hpu ->Get_IDteach_IDclass(CurrentUserName());
//so giao vien day lop
$row_count = sqlsrv_num_rows( $array );
$_SESSION['LopID'] = $lop = $array['LopID'];
$tengiaovien = $array['HoTen'];
$_SESSION['User'] =  $array['NhanVienID'];
//echo ew_StdCurrentDateTime();
//--hungdq xac nhan ngay va thang hien tai theo server
$_SESSION['today']= $today=  'N'.date ('j');
$_SESSION['Month'] = $monn = date('n');
//--hungdq xac nhan danh sach hoc sinh theo lop 
$array_danhsachlop = $sqlserver_hpu->Get_Lop_Diemdanh($lop, $today, $monn);
$get_count = count($array_danhsachlop);
//echo '<pre>' ;
//print_r($array_danhsachlop);
//echo '</pre>';
?>   
      
<div>  <!-- diem danh -->
 <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
  
      Năm học:<b> 2013-2014</b> -- Học kỳ: <b>I</b> -- Điểm danh: <b> <?php echo $array['MaSoLop'];  ?></b> -- Giáo viên: <b><?php echo $tengiaovien = $array['HoTen'];  ?> 
  </div>
  
  <?php if ($get_count > 0)  // xac nhan giao vien chu nhiem
            {  ?>  
   <div style="float:right;margin-top:5px;margin-bottom:5px;">
    <button type="button" id="savechecklist"  class="btn btn-primary">Điểm Danh</button>
  </div>
  <div id="htht">
  </div>
  <div style="clear: both"></div>
   <?php } else {  
     Echo "<div class=\"alert alert-danger\" role=\"alert\">Bạn không phụ trách lớp <br/>
           Hoặc tháng này chưa được thiết lập trong hệ thống LaChildren Xin liên hệ phụ trách để thiết lập lại ngày tháng điểm danh </div>";       
 } ?>
  <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" style="font-size:12px">
        <thead>
            <tr style="background: #bababa;height: 30px">
                <th>TT</th>
                <th>Tên học sinh</th>
               <th>Hình thức điểm danh</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>TT</th>
                <th style="width:15%">Tên học sinh</th>
                <th> Hình thức điểm danh</th>
            </tr>
        </tfoot>
 
        <tbody id="checklistwrapper" >
            
            <?php 
                          for($i =1; $i<Count($array_danhsachlop)+1; $i++)
                              {
                               $value_dihoc = $array_danhsachlop[$i]['HocSinhID']."x_1";
                               $value_nghikhongphep = $array_danhsachlop[$i]['HocSinhID']."x_0";
                               $value_nghicophep = $array_danhsachlop[$i]['HocSinhID']."x_-1";
                               $value_ngayletet = $array_danhsachlop[$i]['HocSinhID']."x_-2";
                               $value_dihoc_xe = $array_danhsachlop[$i]['HocSinhID']."x_2";
                               $value_dihoc_ngoaigio = $array_danhsachlop[$i]['HocSinhID']."x_3";
                               $value_dihoc_ngoaigio_antoi= $array_danhsachlop[$i]['HocSinhID']."x_4";
                            ?>
                               <tr class="checklisttr gradeX" id="<?php echo $i+1; ?>">
                                    <td align="center"><?php echo  $array_danhsachlop[$i]['HocSinhID'] ?></td>
                                    <td><?php echo $array_danhsachlop[$i]['HoTen']; ?></td>
                                    <td>                               
                                       <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" name="<?php echo  $array_danhsachlop[$i]['HocSinhID'] ?>" id="<?php echo $value_dihoc ?>" checked> Đi học 
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="<?php echo  $array_danhsachlop[$i]['HocSinhID'] ?>" id="<?php echo $value_nghikhongphep ?>"> Nghỉ học không phép
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="<?php echo  $array_danhsachlop[$i]['HocSinhID'] ?>" id="<?php echo $value_nghicophep ?>"> Nghỉ học có phép
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" name="<?php echo  $array_danhsachlop[$i]['HocSinhID'] ?>" id="<?php echo $value_ngayletet ?>"> Ngày lễ tết
                                        </label> 
                                        <label class="btn btn-primary">
                                            <input type="radio" name="<?php echo  $array_danhsachlop[$i]['HocSinhID'] ?>" id="<?php echo $value_dihoc_xe ?>"> Đi học + Xe đưa đón HS
                                        </label>  
                                        <label class="btn btn-primary">
                                            <input type="radio" name="<?php echo  $array_danhsachlop[$i]['HocSinhID'] ?>" id="<?php echo $value_dihoc_ngoaigio ?>"> Đi học+Ngoài giờ
                                        </label> 
                                        <label class="btn btn-primary">
                                            <input type="radio" name="<?php echo  $array_danhsachlop[$i]['HocSinhID'] ?>" id="<?php echo $value_dihoc_ngoaigio_antoi ?>"> Đi học+Ngoài giờ+Ăn tối
                                        </label>                                         
                                        </div>
                                    </td>
                                    
                                </tr>
                            <?php }  ?>
        </tbody>
    </table>  
</div> <!-- enfd </div>-->
      <script>
    $('#savechecklist').click(function() {
    var the_value;
    //the_value = jQuery('input:radio:checked').val();
    //the_value = jQuery('input[name=macro]:radio:checked').val();
    the_value = getChecklistItems();
    //alert(the_value);
    
     $("#htht").html('<center style="margin-top:100px"><img  src="images/ajax-loading.gif">...process...</center>');
       $.ajax({
            type: "POST",
            data: "ser_code=" + the_value,
            url: "ms_array.php",
            success: function(msg){
                if (msg != ''){
                   $("#htht").html(msg).show();
                }
                else{
                    $("#htht").html('<em>No item result</em>');
                }
            }
        });
    
});

function getChecklistItems() {
    var result = 
        $("tr.checklisttr > td > div > label > input:radio:checked").get();
    
    var columns = $.map(result, function(element) {
        return $(element).attr("id");
    });

    return columns.join(",");
}
    
    </script> 
       </div>
  </div>    

<div id="push"></div>  <!-- end wrapper--></div>
                    <!-- Include all compiled plugins (below), or include individual files as needed -->
                    <script src="js/bootstrap.min.js"></script>      
<?php include "include/is_footer.php" ?>  