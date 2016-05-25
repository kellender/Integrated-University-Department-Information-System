<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Professor</title>
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
        <li><a href="index.html"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
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

      
    <hr>
    
    <h4>Salary: $32.01/hr</h4>      
    
    <hr>
    <hr>
    <h4>Classes Teaching:</h4>      		
    <div class="row" style="margin-bottom:0px">                               
            <!-- center left-->	
         	<div class="col-md-6">
			  <!-- <div class="well">Registrar</div> -->
              <hr>              


                    <?php
												$fp = stream_socket_client("tcp://0.0.0.0:13002", $errno, $errstr, 5);
												 	if (!$fp) {
															 echo $errstr;
															 exit(1);
													}
												fwrite($fp, "profClass " . $_COOKIE['Username'] . ' ' . $_COOKIE['Password']. " Fall 2009");
												$courseID = "";
												while($line = fgets($fp)) {
													//echo $line . "\n";
													$pieces = explode(":", $line);
													if($line == '0'){
														echo '<tr>';
			                      echo '<td>You have not registared for any courses for the spring 2010 semester</td>';
			                      echo '<td></td>';
			                      echo '<td></td>';
				                    echo '</tr>';
														break;
												 }
													//echo "courseID :" . $courseID ."\n";
													if($courseID == ""){
														$courseID = $pieces[1]; 
												 		echo '<div class="panel panel-default">';
												    echo '<div class="panel-heading"><h4 style="display:inline">' . $pieces[1] .' </h4><h4 style="padding-left:350px;display:inline;">Section ' .$pieces[2]. '</h4></div>';
												    echo '<div class="panel-body">';
														echo '<ul class="list-group">';
													}
													if ($pieces[1] != $courseID){
												  	echo '</ul>';
														echo '</div><!--/panel-body-->';
												  	echo '</div><!--/panel-->';

												 		echo '<div class="panel panel-default">';
												    echo '<div class="panel-heading"><h4 style="display:inline">' . $pieces[1] .' </h4><h4 style="padding-left:350px;display:inline;">Section ' .$pieces[2]. '</h4></div>';
												    echo '<div class="panel-body">';
														echo '<ul class="list-group">';

													}
              						echo '<li class="list-group-item">'.$pieces[0].'</li>';


												}
												echo '</ul>';
												echo '</div><!--/panel-body-->';
												echo '</div><!--/panel-->';

											?>
                        
          	</div><!--/col-->
            
              
			</div><!--/col-span-6-->

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
