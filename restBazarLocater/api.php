<?php

/*
  This is an example class script proceeding secured API
  To use this class you should keep same as query string and function name
  Ex: If the query string value rquest=delete_user Access modifiers doesn't matter but function should be
  function delete_user(){
  You code goes here
  }
  Class will execute the function dynamically;

  usage :

  $object->response(output_data, status_code);
  $object->_request	- to get santinized input

  output_data : JSON (I am using)
  status_code : Send status message for headers

  Add This extension for localhost checking :
  Chrome Extension : Advanced REST client Application
  URL : https://chrome.google.com/webstore/detail/hgmloofddffdnphfgcellkdfbfbjeloo

  I used the below table for demo purpose.

  CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fullname` varchar(25) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 */

require_once("Rest.inc.php");
include ("DB.php");
$db = new DB();

class API extends REST {

    public $data = "";

    /*
     * Public method for access api.
     * This method dynmically call the method based on the query string
     *
     */

    public function processApi() {
        $func = strtolower(trim(str_replace("/", "", $_REQUEST['action'])));
        if ((int) method_exists($this, $func) > 0)
            $this->$func();
        else
            $this->response('Invalid Action', 404);    // If the method not exist with in this class, response would be "Page not found".
    }

    private function loginDetail() {
        $db = new DB();
        // Cross validation if the request method is GET else it will return "Not Acceptable" status
        if ($this->get_request_method() != "GET") {
            $this->response('Not Acceptable', 406);
        }

        $email = $this->_request['email'];
        $password = $this->_request['pwd'];

        $condition = array('where' => array('email' => $email,
                'password' => $password, 'active' => 1), 'select' => 'wid,name');

        $records = $db->getRows('t_field_worker_detail', $condition);
        if ($records) {
			 $rec =  array_values($records)[0]; 
			 $rec["status"]="success"; 
            $this->response($this->json($rec), 200);
        }

        // If invalid inputs "Bad Request" status message and reason
        $error = array('status' => "Failed", "msg" => "Invalid Request");
        $this->response($this->json($error), 400);
    }

    
     private function uploadData(){
         
         if ($this->get_request_method() != "POST") {
            $this->response('Not Acceptable', 406);
        }
		
         $db = new DB();
         $cid=$_POST["cid"];
         $wid=$_POST["wid"];
         $aadharno=$_POST["aadharno"];
         $panno=$_POST["panno"];
		  $phonenumber=$_POST["phonenumber"];
		  $education= $_POST['education'];
		  $linkedaccount= $_POST['linkedaccount'];
          $filename = $_FILES['image']['name'];
          $filedata = $_FILES['image']['tmp_name'];
          $path_parts = pathinfo($filename);
		 $ext= $path_parts['extension'];
		
		$targetPath="";
		$file_name="";
        //$temp="";
		$filenameAltered="";
         if ($filedata != '') 
    {        
		       $accno = $db->geAccountNumber("t_cus","cid",$cid);
			   if($accno){
				 $temporary = explode(".", $_FILES["image"]["name"]);
             $file_extension = end($temporary);
			 
			// echo $temp = explode(".", $_FILES["image"]["name"]);
			 
			 $rand = rand(10000000, 999999999);
             $time = time();
			//$file_name = $accountno.$_FILES["image"]["name"].'.'.$ext;
			 $file_name = $rand.$time.$_FILES["file"]["name"].'.'.$ext;
			 $filenameAltered = $accno.'.'.$ext;
             $sourcePath = $_FILES['image']['tmp_name']; // Storing source path of the file in a variable
             $targetPath = "../upload/".$filenameAltered; // Target path where file is to be stored
          

		   move_uploaded_file($sourcePath,$targetPath) ;
			 }else{
				 $data["status"]="failed";
				 $data["msg"]="Account Number Does Not Exist for this Cuntomer";
			 } 
	    }
        
         $userData = array(
                    'wid' => $wid,
                   'aadharno' => $aadharno,
                    'panno' =>$panno,
					'education'=>$education,
					'imagepath'=>$targetPath,
					'mobno'=>$phonenumber,
					'linkedaccountno'=>$linkedaccount
					
                );
                $condition = array('cid' => $cid);
               $update = $db->update('t_cus',$userData,$condition);
			   
             if($update)               
			   {
					$data["status"]="success";
			   }
				else{
					
					$data["status"]="failed";
				}
         $this->response($this->json($data), 200);
     }
    
    
	
	private function loadState(){
		$db = new DB();
		if ($this->get_request_method() != "GET") {
            $this->response('Not Acceptable', 406);
        }
		//http://localhost/bazar_locater_phpcore/restBazarLocater/api.php?action=loadState
		$condition = array('select' => 'city_state' ,'group by'=>'city_state');
		$records = $db->getRows('t_cities', $condition);
        if ($records) {
           // $data['data'] = $records;
            $this->response($this->json($records), 200);
        }
		$error = array('status' => "Failed", "msg" => "Invalid Request");
        $this->response($this->json($error), 400);
    }
	
	
	private function loadCity(){
		$db = new DB();
		if ($this->get_request_method() != "GET") {
            $this->response('Not Acceptable', 406);
        }
		
		 $state = $_REQUEST['state'];
		$condition = array('where' => array('city_state' => $state),'select' => 'city_name');
		$records = $db->getRows('t_cities', $condition);
        if ($records) {
           // $data['data'] = $records;
            $this->response($this->json($records), 200);
        }
		$error = array('status' => "Failed", "msg" => "No record found");
        $this->response($this->json($error), 400);
    }
	
	
	
	private function loadRegion(){
		$db = new DB();
		if ($this->get_request_method() != "GET") {
            $this->response('Not Acceptable', 406);
        }
		
		 $state = $_REQUEST['state'];
		 $city = $_REQUEST['city'];
		$condition = array('where' => array('city_state' => $state,'city_name' => $city),'select' => 'region');
		$records = $db->getRows('t_region', $condition);
        if ($records) {
            $this->response($this->json($records), 200);
        }
		$error = array('status' => "Failed", "msg" => "No record found");
        $this->response($this->json($error), 400);
    }
	
	private function loadCategory(){
		$db = new DB();
		if ($this->get_request_method() != "GET") {
            $this->response('Not Acceptable', 406);
        }
		$condition = array('where' => array('active' => 1),'select' => 'categoryname');
		$records = $db->getRows('t_category', $condition);
        if ($records) {
            $this->response($this->json($records), 200);
        }
		$error = array('status' => "Failed", "msg" => "No record found");
        $this->response($this->json($error), 400);
    }
	
	private function loadSubCategory(){
		$db = new DB();
		if ($this->get_request_method() != "GET") {
            $this->response('Not Acceptable', 406);
        }
		    $category = $_REQUEST['category'];
			$condition = array('where' => array('categoryname' => $category,'active' => 1),'select' => 'subcategoryname');
		$records = $db->getRows('t_subcategory', $condition);
        if ($records) {
            $this->response($this->json($records), 200);
        }
		$error = array('status' => "Failed", "msg" => "No record found");
        $this->response($this->json($error), 400);
    }
	
	
	
	

    /*
     * 	Encode array into JSON
     */

    private function json($data) {
        if (is_array($data)) {
            return json_encode($data);
        }
    }

}

// Initiiate Library

$api = new API;
$api->processApi();
?>