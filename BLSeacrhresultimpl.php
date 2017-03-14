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


	function searchResult($state,$city,$region,$category,$subcategory,$roleid)
   {    $log = new Logging();   
        $log->lfile('mylog.txt');
        $db = new DB(); 
		  $userroleid = $roleid + '1';
	  
	  // $condition = array('where' => array('uc.user_roleid' => 2,
            //    'cat.categoryname' => 'uc.user_category'), 'select' => 'wid,name');
		try{		
	
	//echo $state
	$query="";
	if(!empty($state)&& !empty($city) && !empty($region)){
$query="SELECT uc.user_roleid,uc.user_userid,upd.user_shopname,upd.user_shop_mobile,upd.user_shop_email,upd.user_shop_web,uc.user_category,cat.imagepath FROM t_user_profile_detail upd join t_user_category_rel uc on uc.user_userid= upd.user_userid join t_category cat on uc.user_category=cat.categoryname where upd.user_roleid='$userroleid' and upd.user_state='$state' and upd.user_city='$city' and upd.user_region='$region'and uc.user_category='$category' and uc.user_userid= upd.user_userid order by upd.user_userid";
	}
	else{
		
		 $query="SELECT uc.user_roleid,uc.user_userid,upd.user_shopname,upd.user_shop_mobile,upd.user_shop_email,upd.user_shop_web,uc.user_category,cat.imagepath FROM t_user_profile_detail upd join t_user_category_rel uc on uc.user_userid= upd.user_userid join t_category cat on uc.user_category=cat.categoryname where upd.user_roleid='$userroleid' and  uc.user_category='$category' and uc.user_userid= upd.user_userid order by upd.user_userid";
	}
	 $records = $db->getRecords($query);
	
	
	
	 /* $condition = array('where' => array('uc.user_roleid' => 2,
                'cat.categoryname' => 'uc.user_category'),'select' => ' uc.user_roleid,uc.user_userid,uc.user_category,uc.user_shopname,uc.user_shop_mobile,uc.user_shop_email,uc.user_shop_web,cat.imagepath,uc.user_userid','order_by'=>'uc.user_userid');
	  $records = $db->getRows('t_user_category_rel uc ,t_category cat',$condition);*/
	 // echo sizeof($records);
	  if(sizeof($records)>0){
		    $result=(array_values($records));
			  if($records){
		  return $result;
	  }
	  }
	  else{
		  return $records;
	  }
	
	 // print_r($result);
	
	}catch(Exception $e){
		//echo ;
		$log->lwrite($e->getMessage());
            }
			$log->lclose();
	}  


function loadRating($roleid,$userid)
   {    $log = new Logging();   
        $log->lfile('mylog.txt');
        $db = new DB(); 
	  try{		
	
    // $userid;
	 $roleid = $roleid + '1';
	
	  $condition = array('where' => array('r.roleid' => $roleid,'u.roleid' => $roleid,'u.userid' => 'r.userid'),'select' => 'sum(r.speedrate+r.pricerate+r.qualityrate)  as rating,r.userid as user_id,r.roleId as role_id','group by' => 'r.userid','order_by'=>'r.userid');
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


function totalCountGroupby($roleid,$userid)
   {    $log = new Logging();   
        $log->lfile('mylog.txt');
        $db = new DB(); 
	  try{		
	
	$roleid = $roleid + '1';
	  $condition = array('where' => array('r.roleid' => $roleid,'u.roleid' => $roleid,'u.userid' => 'r.userid'),'select' => 'r.userid as user_id,r.roleId as role_id,count(*) as count','group by' => 'r.userid',
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