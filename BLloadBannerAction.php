<?php
//include 'DB.php';
include 'BLloadBannerImpl.php';
include 'config.php';
$cf = new config();
$bl = new BLloadBannerImpl();


//$db = new DB();
//$tblName = 'users';
if(isset($_REQUEST['type']) && !empty($_REQUEST['type'])){
    $type = $_REQUEST['type'];
    switch($type){
		
			 
			 case "bannermain":	
		     $result=$bl->loadMainBanner();
			 //print_r($result);
		     //echo json_encode($data_jason);
			 $i=0;
			 foreach($result as $arrayValue){  
			if($i==0){
				?>
			 <div class="item active slider">
              <img src='<?php  echo $cf->baseurl; ?>/bazar_admin_codeigniter/<?php echo $arrayValue['banners']; ?>' class="img-responsive" height="357px">
             </div>
				<?php
			}else
			 ?>
			     <div class="item  slider">
                  <img src='<?php  echo $cf->baseurl; ?>/bazar_admin_codeigniter/<?php echo $arrayValue['banners']; ?>' class="img-responsive" height="357px">
                 </div>
		
         <?php
			 $i++;
			 }
			 
		     break;
		  default:
            echo '{"status":"INVALID"}';
    }
}