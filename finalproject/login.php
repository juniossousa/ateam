<!DOCTYPE html>
  <html>
 <head>
 		
		
		<?php

/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'username';

/*** mysql password ***/
$password = 'password';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=mysql", $username, $password);
    /*** echo a message saying we have connected ***/
    echo 'Connected to database';
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

$query = "select * from attendancelogin where username = :username and Password = :Password LIMIT 1");

    
   
        $q = $DBH->prepare("select * from attendancelogin where username = :username and Password = :Password LIMIT 1");
        $q->bindValue(':username', $username);
        $q->bindValue(':Password',  $Password);
        $q->execute();
        $check = $q->fetch(PDO::FETCH_ASSOC);
        $message = '';
		
    if (!empty($check)){
        $username = $check['username'];
        
        $message = 'Successfull Attendance!!!';
    } else {
         $message= 'Sorry your log in details are not correct';
    }
    
}
?>
	<title> CCt College</title>
	       <link rel = "stylesheet" href="style/style.css">
	        <link rel="attendancedetails.php" href="get the attendance" >
	 
    </head>
        
		<div  id= "title">
    <?php
          echo '<p>CCT College</p>';
          
         ?>
		 </div>
   
  
    
</html>

