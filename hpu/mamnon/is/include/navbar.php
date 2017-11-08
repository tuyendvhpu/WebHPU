<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" style="margin-top: -5px;color: navy" href="#"> <img class="img-rounded" src="images/logo.png" alt="Haiphong Private University"/> MẦM NON HỮU NGHỊ QUỐC TẾ </a> 
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <ul class="nav navbar-nav">
        <li><a  href="#"><b>Thể chất, phát triển, nhận thức </b></a></li>
        <li><a href="#"><b>Nhật ký sức khỏe</b></a></li>
        <li><a href="#"><b>Lịch trình giảng dạy</b></a></li>
        <li class="active"><a href="#"><b>Điểm danh</b></a></li>
        <li><a href="#"><b>Báo cáo</b></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hệ thống <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#"> <img src="images/home.png">&nbsp;&nbsp;  Trang chủ HPU</a></li>
            <li><a href="#"><img src="images/is.png">&nbsp; Trang chủ mầm non</a></li>
            <li><a href="#"><img src="images/search.png">&nbsp; Tra cứu mầm non</a></li>
            <li class="divider"></li>
            <li> 
               <?php 
					if (IsLoggedIn()==1) {
					echo "<a href=\"logout.php\" > <img src=\"images/login.png\"> &nbsp; &nbsp;Thoát</a>";
					}
					else {
					echo "<a href=\"logout.php\"> <img src=\"images/login.png\"> &nbsp; &nbsp;Đăng nhập</a>";
					}
                ?>
                
               
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>