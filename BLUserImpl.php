<?php
include 'DB.php';
include('mylib.php');


class BLUserImpl extends Exception {
	
	 public function errorMessage() {
    //error message
    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
    .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
    return $errorMsg;
  }
	function pushData($tblName,$userData,$emailid){
		$log = new Logging();   
        $log->lfile('mylog.txt');
        $db = new DB(); 
	    try{		
		$chekEmailExist = $db->validateEmail($tblName,$emailid,'email');
                  
                    if($chekEmailExist){
                       // echo "Employee Already Registered";
						return "Email Already Registered.";
                    }else{
				         $insert = $db->insert($tblName,$userData);
		                if($insert){
							//echo "You have been successfully registered.";
		               return "You have been successfully registered.";
	                  }
	                }
	            }catch(Exception $e){
				$log->lwrite($e->getMessage());
			   }
				$log->lclose();
			}  

 	
	
	
	
	
	
	
}

?>