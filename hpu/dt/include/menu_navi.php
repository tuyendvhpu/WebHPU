<?PHP 
switch ($ative_dt) {
    case 5:
        $class5= "class=\"amemnuactive\"";
        break;
    case 1:
         $class1= "class=\"amemnuactive\"";
        break;
    case 2:
         $class2= "class=\"amemnuactive\"";
        break;
    case 3:
         $class3= "class=\"amemnuactive\"";
        break;
}
?>
<ul id="ulnavi">
                <li><a <?php if ($ative_dt == 5) echo $class5 ?> href="Doanthegioithieu.html" title="Giới thiệu đoàn thể tại Haiphong Private University">Giới Thiệu</a></li>
                <li><a <?php if ($ative_dt == 1) echo $class1 ?> title="Tin tức tổng hợp từ các đoàn thể tại Haiphong Private University" href="Doanthetintuctonghop.html"> Tin Tức </a></li>
                <li><a <?php if ($ative_dt == 2) echo $class2 ?> title="Tuyên dương các các nhân tập thể trong công tác đoàn thể tại Haiphong Private University" href="Doanthetuyenduong.html">Tuyên Dương</a></li>
                <li><a <?php if ($ative_dt == 3) echo $class3 ?> title="Thông báo tổng hợp từ các đoàn thể tại Haiphong Private University" href="Doanthethongbao.html">Thông Báo</a></li>
 </ul>

