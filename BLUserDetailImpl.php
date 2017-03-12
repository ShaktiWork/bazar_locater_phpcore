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


	function loadResult($userId,$roleId)
   {    $log = new Logging();   
        $log->lfile('mylog.txt');
        $db = new DB(); 
	  
	  // $condition = array('where' => array('uc.user_roleid' => 2,
            //    'cat.categoryname' => 'uc.user_category'), 'select' => 'wid,name');
		try{		
	
	
 $query= "SELECT uc.user_roleid,uc.user_userid,upd.user_shopname,upd.user_shop_mobile,upd.user_shop_email,upd.user_shop_web,uc.user_category,cat.imagepath FROM t_user_profile_detail upd join t_user_category_rel uc on uc.user_userid= upd.user_userid join t_category cat on uc.user_category=cat.categoryname where upd.user_userid=7 and upd.user_roleid=2 and uc.user_category='Flight' and uc.user_userid= upd.user_userid order by upd.user_userid";
 $records = $db->getRecords($query);
	
	
	 /* $condition = array('where' => array('uc.user_roleid' => 2,
                'cat.categoryname' => 'uc.user_category','uc.user_userid' => 2),'select' => ' uc.user_roleid,uc.user_userid,uc.user_category,uc.user_shopname,uc.user_shop_mobile,uc.user_shop_email,uc.user_shop_web,cat.imagepath,uc.user_userid');
	  $records = $db->getRows('t_user_category_rel uc ,t_category cat',$condition);*/
	 $result=(array_values($records));
	// print_r($result);
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