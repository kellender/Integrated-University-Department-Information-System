<!doctype html>
<html>
  <head>
    
    <meta charset="UTF-8">
  </head>
  <body>

<?php


  $Username = $_POST["username"];
	$cookie_name = "Username";
	$cookie_value = $_POST["username"];
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	$cookie_name = "Password";
	$cookie_value = $_POST["password"];
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");




	


	$fp = stream_socket_client("tcp://0.0.0.0:13002", $errno, $errstr, 5);
   	if (!$fp) {
    	   echo $errstr;
  	     exit(1);
  	}
	fwrite($fp, "Cred " . $_COOKIE['Username'] . ' ' . $_COOKIE['Password']);



	while($line = fgets($fp)) {
		echo $line;
	       if($line == 'student'){
			header("location:studentpg.php");	
		}
		elseif ($line == 'admin'){
			header("location:officialadmin.php");
		}
		elseif ($line == 'official'){
			header("location:officialadmin.php");
		}
		elseif ($line == 'Professor'){
			header("location:professor.php");
		}
		elseif ($line == '1' or $line == '0'  ){
			header("location:login.html");
		}

	   }


?>

   </body>
</html>

