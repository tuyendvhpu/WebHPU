      <script type="text/javascript">
        $(document).ready(function(){
            $("p.plich").hide();
            $("p.pactive").show();
            $("h4").click(function(){
                $("p.plich").slideUp("fast");
                if($(this).next("p.plich").is(":hidden") == true){
                    $(this).next("p.plich").slideDown("fast");
                }
                
            });
        });
    </script>
<div id="wrapperlich">
    
     <h4> Lịch công tác Phòng - Ban</h4>
     <p class="plich pactive">
        <a class="atittlecalendar aactive" target="_blank" href="http://phong.hpu.edu.vn/Khoiphonglich.html">  Khối Các Phòng </a><br />
        <a class="atittlecalendar" target="_blank" href="http://ban.hpu.edu.vn/Khoibanlich.html">  Khối Các Ban </a><br />
    </p>
    <h4> Lịch công tác Khoa - Bộ Môn</h4>
    <p class="plich ">
        <a class="atittlecalendar" target="_blank" href="http://cntt.hpu.edu.vn/CNTTlich.html">  Khoa Công Nghệ Thông Tin </a><br />
        <a class="atittlecalendar" target="_blank" href="http://vhdl.hpu.edu.vn/VHDLlich.html">  KHOA DU LỊCH </a><br />
        <a class="atittlecalendar" target="_blank" href="http://xd.hpu.edu.vn/XDlich.html">  Khoa Xây Dựng </a><br />
        <a class="atittlecalendar" target="_blank" href="http://nn.hpu.edu.vn/NNlich.html">  Khoa Ngoại Ngữ </a><br />
        <a class="atittlecalendar" target="_blank" href="http://qt.hpu.edu.vn/QTlich.html">  Khoa Quản Trị Kinh Doanh </a><br />
        <a class="atittlecalendar" target="_blank" href="http://ddt.hpu.edu.vn/DDTlich.html">  Khoa Điện - Điện Tử </a><br />
        <a class="atittlecalendar" target="_blank" href="http://mt.hpu.edu.vn/MTlich.html">  Khoa Môi Trường </a><br />
        <a class="atittlecalendar" target="_blank" href="http://cbcs.hpu.edu.vn/CBCSlich.html">  Bộ Môn Bản Cơ Sở </a><br />
        <a class="atittlecalendar" target="_blank" href="http://gdtc.hpu.edu.vn/GDTClich.html">  Bộ Môn Giáo Dục Thể Chất </a><br /> 
        </p>
    <h4> Lịch công tác Trung tâm</h4>
    <p class="plich">
        <a class="atittlecalendar" target="_blank" href="http://tv.hpu.edu.vn/TT-Thongtin-Thuvienlich.html">  Trung Tâm Thông Tin Thư Viện </a><br />  
   </p>
    <h4> Nhóm lịch </h4>
        <p class="plich">
          <a class="atittlecalendar" href="http://hpu.edu.vn/lichcongtac/HPUlich.html">  Lịch Sự Kiện Thường </a><br />
          <a class="atittlecalendar" href="http://hpu.edu.vn/lichcongtac/HPUlich.html">  Lịch Công Việc Theo Công Văn </a><br />
          <a class="atittlecalendar" href="http://hpu.edu.vn/lichcongtac/HPUlich.html">  Lịch Chung </a><br />
        </p>
     <h4> Tìm kiếm nhanh </h4>

</div><!-- End #wrapper -->

                        <link type="text/css" href="../css/jquery.datepick.css" rel="stylesheet">
                        <script type="text/javascript" src="../js/jquery.datepick.js"></script>
                        <script type="text/javascript" src="../js/jquery.datepick-vi.js"></script>
                        <script type="text/javascript">
                        $(function() {
                                $('#inlineDatepicker').datepick({dateFormat: 'yyyy-mm-dd',onSelect: showDate});
                        });
                        function showDate(date1) {
                        var date = new Date(date1);       
                        var month = date.getMonth()+1;
                        var day = date.getDate();
                        var year = date.getYear()+1900;
                        newdate = year + "-" + month + "-" + day ;
                        //   alert('The date chosen is ' + newdate);
                        window.location = "Khoiphonglich-ngay.html?date="+newdate+"";
                        }
                        </script>

                        <div id="inlineDatepicker" style="width: 250px"></div>  