<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        
        h4 {
  margin-top: 25px;
}
.row {
  margin-bottom: 20px;
}
.row .row {
  margin-top: 10px;
  margin-bottom: 0;
}
[class*="col-"] {
  padding-top: 15px;
  padding-bottom: 15px;
  background-color: #eee;
  background-color: rgba(86,61,124,.15);
  border: 1px solid #ddd;
  border: 1px solid rgba(86,61,124,.2);
}

hr {
  margin-top: 40px;
  margin-bottom: 40px;
}
        
    </style>
  </head>
  <body>
      
      
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
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
      
 <div class="container"> 
          
   
      
                <ul class="nav nav-pills">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Messages</a></li>
                </ul>
     
      
          
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="../" class="navbar-brand">Bootstrap</a>
                    </div>
                    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                    <ul class="nav navbar-nav">
                        <li>
                        <a href="../getting-started">Getting started</a>
                        </li>
                        <li>
                        <a href="../css">CSS</a>
                        </li>
                        <li>
                        <a href="../components">Components</a>
                        </li>
                        <li>
                        <a href="../javascript">JavaScript</a>
                        </li>
                        <li>
                        <a href="../customize">Customize</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="http://expo.getbootstrap.com" onclick="ga('send', 'event', 'Navbar', 'Community links', 'Expo');">Expo</a></li>
                        <li><a href="http://blog.getbootstrap.com" onclick="ga('send', 'event', 'Navbar', 'Community links', 'Blog');">Blog</a></li>
                    </ul>
                    </nav>
                </div>
                <div class="row">
                <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>
                <div class="col-xs-12 col-sm-6 col-md-8">.col-xs-12 .col-sm-6 .col-md-8</div>

                </div>
                <div class="row">
                <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
                <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
                <!-- Optional: clear the XS cols if their content doesn't match in height -->
                <div class="clearfix visible-xs-block"></div>
                <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
                </div>
                    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                    <!-- Include all compiled plugins (below), or include individual files as needed -->
                    <script src="js/bootstrap.min.js"></script>
        </div>
    <form action="get" method="post">
    <table width="100%">
        <tbody id="checklistwrapper">
            
            <tr class="checklisttr" id="1">
                
                <td align="left" width="40%"><br>
                    <label for="veryiii" style="align:left;">Within your circle of competence?</label>
                </td>
                
                <td align="center">
                    <label for="veryi" width="12%">Worst</label><br><br>
                    <input type="radio" id="veryi1" value="5.0" name="circle">
                </td>
                
                <td align="center" width="12%"><br><br>
                    <input type="radio" id="vii2" value="4.5" name="circle">
                </td>
                
                <td align="center" width="12%">
                    <label for="veryiii">Neutral</label><br><br>
                    <input type="radio" id="veryiii3" value="3.0" name="circle"> 
                </td>
                
                <td align="center" width="12%"><br><br>
                    <input type="radio" id="viv4" value="1.5" name="circle">
                </td>
                
                <td align="center" width="12%">
                    <label for="veryv">Best</label><br><br>
                    <input type="radio" id="veryv5" value="1.0" name="circle">
                </td>
            </tr>
            
            <tr class="checklisttr" id="2">
                
                <td align="left" width="40%"><br>
                    <label for="veryiii" style="align:left;">Macro economic environment favorable?</label>
                </td>
                
                <td align="center" width="12%"><br>
                    <input type="radio" id="veryi7" value="5.0" name="macro">
                </td>
                
                <td align="center" width="12%"><br>
                    <input type="radio" id="vii8" value="4.5" name="macro">
                </td>
                
                <td align="center" width="12%"><br>
                    <input type="radio" id="veryiii9" value="3.0" name="macro"> 
                </td>
                
                <td align="center" width="12%"><br>
                    <input type="radio" id="viv10" value="1.5" name="macro">
                </td>
                
                <td align="center" width="12%"><br>
                    <input type="radio" id="veryv11" value="1.0" name="macro">
                </td>
            </tr>
            
        </tbody></table>
    
    <div style="float:right;margin-top:10px;margin-bottom:5px;">
        <button type="button" id="savechecklist">Save Checklist</button>
    </div>
    <script>
    $('#savechecklist').click(function() {
    var the_value;
    //the_value = jQuery('input:radio:checked').val();
    //the_value = jQuery('input[name=macro]:radio:checked').val();
    the_value = getChecklistItems();
    alert(the_value);
});

function getChecklistItems() {
    var result = 
        $("tr.checklisttr > td > input:radio:checked").get();
    
    var columns = $.map(result, function(element) {
        return $(element).attr("id");
    });

    return columns.join("|");
}
    
    </script>    
        
        
        
        
  </body>
</html>