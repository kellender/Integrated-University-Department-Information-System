<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Official/Admin</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<!-- Header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">IUDIS</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
	<?php

           echo '<a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user">' . $_COOKIE['Username'] . '</i> <span class="caret"></span></a>'

	?>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
            <li><a href="#">My Profile</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container-fluid">
<div class="row">
	<div class="col-sm-3">
      <!-- Left column -->
      <a href="#"><strong><i class="glyphicon glyphicon-wrench"></i> Tools</strong></a>  
      
      <hr>
      
      <ul class="list-unstyled">
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">
          <h5>Settings <i class="glyphicon glyphicon-chevron-down"></i></h5>
          </a>
            <ul class="list-unstyled collapse in" id="userMenu">
                <li class="active"> <a href="index.html"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-envelope"></i> Messages <span class="badge badge-info">4</span></a></li>
                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Options</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-comment"></i> Shoutbox</a></li>              
                <li><a href="register.html"><i class="glyphicon glyphicon-flag"></i> Register</a></li>
                <li><a href="tuition.html"><i class="glyphicon glyphicon-usd"></i> Tuition</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
            </ul>
        </li>
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#menu2">
          <h5>Reports <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>
        
            <ul class="list-unstyled collapse" id="menu2">
                <li><a href="#">Information &amp; Stats</a>
                </li>
                <li><a href="#">Views</a>
                </li>
                <li><a href="#">Requests</a>
                </li>
                <li><a href="#">Timetable</a>
                </li>
                <li><a href="#">Alerts</a>
                </li>
            </ul>
        </li>
        <li class="nav-header">
        <a href="#" data-toggle="collapse" data-target="#menu3">
          <h5>Social Media <i class="glyphicon glyphicon-chevron-right"></i></h5>
          </a>
        
            <ul class="list-unstyled collapse" id="menu3">
                <li><a href="#"><i class="glyphicon glyphicon-circle"></i> Facebook</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-circle"></i> Twitter</a></li>
            </ul>
        </li>
      </ul>
           
      <hr>
      
      <a href="#"><strong><i class="glyphicon glyphicon-link"></i> Resources</strong></a>  
      
      <hr>
      
      <!-- <ul class="nav nav-pills nav-stacked">
        <li class="nav-header"></li>
        <li><a href="#"><i class="glyphicon glyphicon-list"></i> Layouts &amp; Templates</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-briefcase"></i> Toolbox</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-link"></i> Widgets</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-list-alt"></i> Reports</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-book"></i> Pages</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-star"></i> Social Media</a></li>
      </ul> -->
      
      <hr>

      <hr>
    
      
  	</div><!-- /col-3 -->
    <div class="col-sm-9">
      	
      <!-- column 2 -->	
      <ul class="list-inline pull-right">
         <li><a href="#"><i class="glyphicon glyphicon-cog"></i></a></li>
         <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-comment"></i><span class="count">3</span></a><ul class="dropdown-menu" role="menu"><li><a href="#">1. Is there a way..</a></li><li><a href="#">2. Hello, admin. I would..</a></li><li><a href="#"><strong>All messages</strong></a></li></ul></li>
         <li><a href="#"><i class="glyphicon glyphicon-user"></i></a></li>
         <li><a title="Add Widget" data-toggle="modal" href="#addWidgetModal"><span class="glyphicon glyphicon-plus-sign"></span> Add Widget</a></li>
      </ul>
      <a href="#"><strong><i class="glyphicon glyphicon-user"></i> Official/Advisor's Name (N12345678)</strong></a>  
      
      
      
		<div class="row">
           
            
          
            <!-- center left-->	
         	<div class="col-md-6">			  
              <hr>              
              <table class="table" style="width: auto !important">
                <tr>
                  <td>Department Budget: </td>
                  <td>$10,000 </td>
                  <td></td>
                </tr>
                <tr>
                  <td>Expenses: </td>
                  <td>$9,000</td>
                  <td></td>
                </tr>
              </table>                
              <hr>

              
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">Enter Student ID:</span>
                  <input type="text" class="form-control" placeholder="Student ID" aria-describedby="basic-addon1">
                </div>
              
              <!-- <hr> -->

              <div class="panel panel-default">
                <div class="panel-heading">Student's Name</div>
                  <div class="panel-body">
                  <h4 style="display:inline">Balance: $1529.00</h4> 
                  
                  <hr>  
                  <hr>
                  <h4>Current Classes:</h4>
                <table class="table table-hover" >
                  <tr>
                    <td>ClassA   <button class="btn btn-danger" type="submit" style="float:right">X</button></td>
                  </tr>
                  <tr>
                    <td>ClassB   <button class="btn btn-danger" type="submit" style="float:right">X</button></td>
                  </tr>
                  <tr>
                    <td>ClassC   <button class="btn btn-danger" type="submit" style="float:right">X</button></td>
                  </tr>
                </table>  
                <div class="panel-body" style="padding:0px 100px">
                <button class="btn btn-primary" type="submit">Transcript</button></td>
                <button class="btn btn-primary" type="submit" style="float:right">Register</button></td>
                </div>
              </div>
              </div>                
              <hr>

              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Enter Professor ID:</span>
                <input type="text" class="form-control" placeholder="Professor ID" aria-describedby="basic-addon1">
              </div>
                            <div class="panel panel-default">
                <div class="panel-heading">Professor's Name</div>
                  <div class="panel-body">
                  <h4 style="display:inline">Salary: $30/hr</h4> 
                  
                  <hr>  
                  <hr>
                  <h4>Classes Teaching:</h4>
                <table class="table table-hover" >
                  <tr>
                    <td>ClassA   <button class="btn btn-danger" type="submit" style="float:right">X</button></td>
                  </tr>
                  <tr>
                    <td>ClassB   <button class="btn btn-danger" type="submit" style="float:right">X</button></td>
                  </tr>
                  <tr>
                    <td>ClassC   <button class="btn btn-danger" type="submit" style="float:right">X</button></td>
                  </tr>
                </table>  
                <h4 style="display:inline">Expenses: $86.74</h4> 

              </div>
              </div>                


          </div>


      <hr>
      

      
      <hr>
      
      
</div>
</div>
<!-- /Main -->
<div class="modal" id="addWidgetModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Widget</h4>
      </div>
      <div class="modal-body">
        <p>Add a widget stuff here..</p>
      </div>
      <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dalog -->
</div><!-- /.modal -->



  
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>
