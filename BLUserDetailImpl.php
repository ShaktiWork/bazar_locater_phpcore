<?php
include 'DB.php';
include('mylib.php');


class BLUserDetailImpl extends Exception {
	
	 public function errorMessage() {
    //error message
    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
    .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
    return $errorMsg;
  }


	function loadResult($userId,$roleId,$categoty)
   {    $log = new Logging();   
        $log->lfile('mylog.txt');
        $db = new DB(); 
	  
	  // $condition = array('where' => array('uc.user_roleid' => 2,
            //    'cat.categoryname' => 'uc.user_category'), 'select' => 'wid,name');
		try{		
	
	
  $query= "SELECT uc.user_roleid,uc.user_userid,upd.user_shopname,upd.user_shop_mobile,upd.user_shop_email,upd.user_shop_web,uc.user_category,cat.imagepath FROM t_user_profile_detail upd join t_user_category_rel uc on uc.user_userid= upd.user_userid join t_category cat on uc.user_category=cat.categoryname where upd.user_userid='$userId' and upd.user_roleid='$roleId' and uc.user_category='$categoty' and uc.user_userid= upd.user_userid order by upd.user_userid";
 $records = $db->getRecords($query);
	
	
	 /* $condition = array('where' => array('uc.user_roleid' => 2,
                'cat.categoryname' => 'uc.user_category','uc.user_userid' => 2),'select' => ' uc.user_roleid,uc.user_userid,uc.user_category,uc.user_shopname,uc.user_shop_mobile,uc.user_shop_email,uc.user_shop_web,cat.imagepath,uc.user_userid');
	  $records = $db->getRows('t_user_category_rel uc ,t_category cat',$condition);*/
	 $result=(array_values($records));
	
	  if($records){
		  return $result;
	  }
	}catch(Exception $e){
		//echo ;
		$log->lwrite($e->getMessage());
            }
			$log->lclose();
	}  





	
	
	
	
}

?>