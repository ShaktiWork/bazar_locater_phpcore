<?php
include 'DB.php';
include('mylib.php');


class BLloadBannerImpl extends Exception {
	
	
	
	function loadMainBanner(){
      $db = new DB(); 
	  $condition = array('select' => 'banners');
	  $records = $db->getRows('t_homepage_banners',$condition);
	  if($records){
		   $Category=(array_values($records)); 
		   return $Category;
	  }
	}   
	
	
	
	
	
}

?>