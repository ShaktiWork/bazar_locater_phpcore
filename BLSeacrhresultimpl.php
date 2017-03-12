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
                'cat.categoryname' => 'uc.user_category'),'select' => ' uc.user_roleid,uc.user_userid,uc.user_category,uc.user_shopname,uc.user_shop_mobile,uc.user_shop_email,uc.user_shop_web,cat.imagepath,uc.user_userid','order_by'=>'uc.user_userid');
	  $records = $db->getRows('t_user_category_rel uc ,t_category cat',$condition);
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


function loadRating()
   {    $log = new Logging();   
        $log->lfile('mylog.txt');
        $db = new DB(); 
	  try{		
	
	  $condition = array('where' => array('r.roleid' => 2,'u.roleid' => 2,'u.userid' => 'r.userid'),'select' => 'sum(r.speedrate+r.pricerate+r.qualityrate)  as rating,r.userid as user_id,r.roleId as role_id','group by' => 'r.userid','order_by'=>'r.userid');
	  $records = $db->getRows('t_user u,t_rat r',$condition);
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


function totalCountGroupby()
   {    $log = new Logging();   
        $log->lfile('mylog.txt');
        $db = new DB(); 
	  try{		
	
	  $condition = array('where' => array('r.roleid' => 2,'u.roleid' => 2,'u.userid' => 'r.userid'),'select' => 'r.userid as user_id,r.roleId as role_id,count(*) as count','group by' => 'r.userid',
	  'order_by'=>'r.userid');
	  $records = $db->getRows('t_user u,t_rat r',$condition);
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