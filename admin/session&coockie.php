<?php 
    session_start();
	
	//setcookie('user_name',null);	
		echo '<br /> cookie:===:';
            print_r($_COOKIE); 
			echo $_COOKIE['user_name'];
		echo '<br /> session:=====:';         
            print_r($_SESSION);  
            echo 'user name is: ';
            echo $_SESSION['user_name'];
?>