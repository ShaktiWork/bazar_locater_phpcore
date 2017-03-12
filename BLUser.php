<?php
//include 'DB.php';
include 'BLUserImpl.php';

$bl = new BLUserImpl();
//$db = new DB();
//$tblName = 'users';
if(isset($_REQUEST['type']) && !empty($_REQUEST['type'])){
    $type = $_REQUEST['type'];
    switch($type){
		
		
		case "register":	
		  /*echo $fname= $_POST['fname'];	
		 echo $lname= $_POST['lname'];	
		  echo $emailid= $_POST['emailid'];	
		  echo $gender= $_POST['gender'];	
		   echo $mobno= $_POST['mobno'];	
		  echo $password= $_POST['password'];*/	
		   $emailid= $_POST['emailid'];
		   $userData = array(
                    'fname' => $_POST['fname'],
                    'lname' => $_POST['lname'],
                    'email' => $_POST['emailid'],
					'gender' => $_POST['gender'],
                    'mobile' => $_POST['mobno'],
					'password' => $_POST['password'],
					'role' => $_POST['role'],
					'roleid' => $_POST['roleid'],
					'active' => 0
                 );
				 $tblName = 't_user';
				 $insert = $bl->pushData($tblName,$userData,$emailid);
			     if($insert){
                   echo  $insert;
                }else{
                  
                     echo 'Some problem occurred, please try again.';
                }
		   
            break;
				
				case "loginUser":
				 if(!empty($_POST['email'])){
					 $email =$_POST['email'];
					 $password =$_POST['pass'];
					
				
					 $login = $bl->login("t_user",$email,$password,"email","password");
					 
				   if($login){
					
					   echo "OK";
					 
					}
					  else{
                   
					echo "ERR";
                    
                }
					 
				 }
		    else{
                
				echo "Some problem occurred, please try again";
             }
			 break;
       
            
        default:
            echo '{"status":"INVALID"}';
    }
}