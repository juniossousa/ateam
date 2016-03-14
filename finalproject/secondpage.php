<!DOCTYPE html>
  <html>
   <head>
   
   <title>CCT College</title>
   </head>
	<body 
	
		
		  
	      <h1> CCT College </h1>
 		 <?php
		 
		 SESSION_START();
			 if($_POST){
				 echo $_SESSION ['username']= $_POST['username'];
				 
				   }
		?>
		
		<?php
            $error ='';
			$un ='';
			$pw ='';
             if($_POST){
           $un = $_POST['username'];
           $pw = $_POST['password'];
		   
		    if(empty($pw )){
				 $error .=' Type a password  ';
				 }
				 if($un =='' ){
				 $error .=' Enter a Name ';
				 }
				 if(strlen($pw)>9){
				 $error .='wrong password <br>';
				 }
				
				 if ($error){
				 echo $error;
				 }else{
				}
    
          try{
		  $host = '127.0.0.1';
		  $dbname = 'test';
		  $user = 'root';
		  $pass = '';
		  # MYSQL with PDO_MYSQL
		  $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		  } catch(PDOException $e) {echo 'Error';}
		  
		  $q = $DBH->prepare("select * from attendancelogin where Name = :username and Password = :password LIMIT 1");
		  $q->bindValue(':username', $un);
		  $q->bindValue(':password', $pw);
		  $q->execute ();
		  $check = $q->fetch(PDO::FETCH_ASSOC);
        $message = '';
		 
    if (!empty($check)){
        $un = $check['Name'];
          
        $message = 'Attendance successfull';
	   echo '<script> window.location="attendancedetails.php";</script>';
    } else {
         $message= 'Sorry your log in details are not correct';
    }
	  
   } 
     
?>
	
   
        
	

   
 
         <form action = "secondpage.php" method ="POST">
         <table>
	     <tr>
	     <td><h3 > Attendance LOGIN</h3></td>
	     </tr>
	     <tr>
         <td>    Name</td><td>  <input type= "text" id ="username"  name = "username"/></td>
	     </tr>
	     <tr>
         <td>   Password</td><td> <input type = "password" id ="password" name = "password"/> </td>
        
		 </tr>
		 <td><input type = "submit"/></td>
		 </table>
		 </form>
		
		
			
	      
			
      
    
	</body>
	 
</html>


		
     


