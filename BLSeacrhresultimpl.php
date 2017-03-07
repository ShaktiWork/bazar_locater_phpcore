<?php
include 'DB.php';
include('mylib.php');


class BLSeacrhresultimpl extends Exception {
	
	 public function errorMessage() {
    //error message
    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
    .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
    return $errorMsg;
  }


	function searchResult($state,$city,$region,$category,$subcategory)
   {    $log = new Logging();   
        $log->lfile('mylog.txt');
        $db = new DB(); 
	  
	  // $condition = array('where' => array('uc.user_roleid' => 2,
            //    'cat.categoryname' => 'uc.user_category'), 'select' => 'wid,name');
		try{		
	
	  $condition = array('where' => array('uc.user_roleid' => 2,
                'cat.categoryname' => 'uc.user_category'),'select' => ' uc.user_category,uc.user_shopname,uc.user_shop_mobile,uc.user_shop_email,uc.user_shop_web,cat.imagepath,uc.user_userid');
	  $records = $db->getRows('t_user_category_rel uc ,t_category cat',$condition);
	  $empRec=(array_values($records));
	  if($records){
		  return $empRec;
	  }
	}catch(Exception $e){
		//echo ;
		$log->lwrite($e->getMessage());
            }
			$log->lclose();
	}   
	
	
	
	
	
	
}

?>