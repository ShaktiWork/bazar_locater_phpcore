
<?php
include 'BLSeacrhresultimpl.php';

$blsearch = new BLSeacrhresultimpl();
//$db = new DB();
//$tblName = 'users';
if(isset($_REQUEST['type']) && !empty($_REQUEST['type'])){
    $type = $_REQUEST['type'];
    switch($type){
		 case "serchresult":
		 
			  $state= $_POST['state'];	
			  $subcategory=$_POST['subcategory'];
			  $city=$_POST['city'];
			  $region=$_POST['region'];
			  $category=$_POST['category'];
		  //$data_jason['Result']=$blsearch->searchResult($state,$city,$region,$category,$subcategory);
			 $result=$blsearch->searchResult($state,$city,$region,$category,$subcategory);
		    // echo json_encode($data_jason);
			
			$result1=(array_values($result));
			
			$rating=$blsearch->loadRating();
			$totalcountGroupby=$blsearch->totalCountGroupby();
			$arrlength = count($rating);
			$totalcountLength = count($totalcountGroupby);
			//echo $totalcountLength;
			//print_r($totalcountGroupby);
			
			//array_push($result1, $rating);
			//print_r($result1);
			 $y=0;
			 $j=0;
			 $jsonArray = array();
			 
			 
			  foreach($result as $key => $csm)
 {
 
  for ($x = $y; $x <$arrlength;) {
	  for($i=$j;$i<$totalcountLength;){
		  
		  
		   if($rating[$x]['user_id']==$totalcountGroupby[$i]['user_id']){
							 
							 $review=$totalcountGroupby[$i]['count'];
							 $result[$key]['review'] = $review;
							$ratingper= $rating[$x]['rating']/(3*$totalcountGroupby[$i]['count']);
							 $result[$key]['ratingper'] = $ratingper;
							
						  }
		  break;
	  }
	  $j++;
	  
	  break;
  }
  $y++;
 }
 //print_r($result);
 
 echo json_encode($result);
			 
			 
			 
			foreach($result as $arrayValue){       
			$ratingper="";
			$review="";
										 $merge="";
			
			//array_push($jsonArray, $rating[$x]['user_id']);
			 ?>
			 
			 
			  <div class="container-fluid">
                    <div class="container container_back">
					RoleId==><?php echo $arrayValue['user_roleid']; ?>
					User Id==><?php echo $arrayValue['user_userid'];
					?>
					 <br /><br />
					<?php
					//$jsonArray[] = $arrayValue;
					 for ($x = $y; $x <$arrlength;) {
				//	$jsonArray[] = $rating[$x]['user_id'];
                     echo "user_id==>".$rating[$x]['user_id']."<br>";
					 /*echo "role_id==>".$rating[$x]['role_id']."<br>";
					 echo  "rating==>".$rating[$x]['rating']."<br>";*/
					 for($i=$j;$i<$totalcountLength;){
						// echo "j value".$j."<br>";
						// echo "user_id==>".$rating[$x]['user_id']."<br>";
						 //echo "innner usreid==>".$totalcountGroupby[$i]['user_id']."<br>";
						  //echo "count==>".$totalcountGroupby[$i]['count']."<br>";
						  
						  if($rating[$x]['user_id']==$totalcountGroupby[$i]['user_id']){
							 //  echo "count==>".$totalcountGroupby[$i]['count']."<br>";
							   //echo  "rating==>".$rating[$x]['rating']."<br>";
							 $result['review']=$totalcountGroupby[$i]['count'];
							  $review=$totalcountGroupby[$i]['count'];
							  
							// $merge = array_merge($jsonArray, $totalcountGroupby[$i]['count']); 
							   //$jsonArray[] = $review;
							  // $jsonArray['review']=$review;
							 $ratingper= $rating[$x]['rating']/(3*$totalcountGroupby[$i]['count']);
							 // echo "ratingper==>".$ratingper."<br>";
							// $jsonArray[] = $ratingper;
						  }
						 break;
					 }
					 $j++;
					 
					 
					 break;
					} 
                 $y++;
					
					?>
					
                    <div class="row">
                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 margin_top">
				<div class="box_shodow">
					<div class="img_box">
						<img src="img/category/13BGCTY5-1_1516349f.jpg" class="img-responsive" alt="clothes">
                                <div class="overlay"></div>
                                </div>
                                	</div>
                                    
                      <div class="content_review">
    		<div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating" class="rating-0 job_listing-rating-wrapper" title="0 Reviews">
			<span class="job_listing-rating-stars">
				
        <span class="stars-rating">
            
                                    <span class="dashicons dashicons-star-empty"></span>
                
            
                                    <span class="dashicons dashicons-star-empty"></span>
                
            
                                    <span class="dashicons dashicons-star-empty"></span>
                
            
                                    <span class="dashicons dashicons-star-empty"></span>
                
            
                                    <span class="dashicons dashicons-star-empty"></span>
                
                    </span>			</span>

			<span class="job_listing-rating-average mrg_lft">
				<span itemprop="ratingValue"><?php echo    round($ratingper, 1);?></span>
				<meta itemprop="bestRating" content="5">
				<meta itemprop="worstRating" content="1">
			</span>
			<span class="job_listing-rating-count">
				<span itemprop="ratingCount"><?php echo $review;  ?></span> Reviews</span>
		</div>
	</div>
   </div>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 categary">
            <div class="category_name"><?php echo $arrayValue['user_category']; ?></div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
            <div class="contact_no"><span class="glyphicon glyphicon-phone"></span>+91- <?php echo $arrayValue['user_shop_mobile']; ?></div>
            <div class="contact_no"><span class="glyphicon glyphicon-envelope"></span>&nbsp;<?php echo $arrayValue['user_shop_email']; ?></div>
            <div class="contact_no">Delivery in | Min order Rs. 100</div>
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12"> 
            <div class="sent_enqiury"><span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;Send Enquiry &nbsp;</div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12"> 
			<div class="sent_enqiury">Write review</div>
            <div class=""><img src="" class="img-responsive" /></div>            
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"> 
			<div class="rigjht_bo"><img src="img/social/bagg.jpg" class="img-responsive" /></div>
            </div>
             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 padding_left1"> 
			<div class=""><img src="img/social/share.png" class="img-responsive" /></div>
            </div>
        </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <div class="contact_no"><?php echo $arrayValue['user_shopname']; ?></div>
            </div>
            
                    </div>
                    	</div></div>
                            </div>
							 <br /><br />
			 
			 
			 
			 <?php
			}
			//print_r($result);
			//echo json_encode($jsonArray);
			
			  break;
			 
			
		
		
        default:
            echo '{"status":"INVALID"}';
    }
}