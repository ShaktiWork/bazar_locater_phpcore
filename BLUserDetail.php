<?php
//include 'DB.php';
include 'BLUserDetailImpl.php';

$blLoad = new BLUserDetailImpl();
//$db = new DB();
//$tblName = 'users';
if(isset($_REQUEST['type']) && !empty($_REQUEST['type'])){
   $type = $_REQUEST['type'];
    switch($type){
  
		case "loadDetail":	
		 $userId= $_POST['userId'];	
		    $roleId= $_POST['roleId'];	
			 $categoty= $_POST['categoty'];	
			
			
		    $result=$blLoad->loadResult($userId,$roleId,$categoty);
			//print_r($result);
			
			$user_userid = array_column($result, 'user_userid');
			$user_roleid = array_column($result, 'user_roleid');
			$user_category = array_column($result, 'user_category');
			$user_shopname = array_column($result, 'user_shopname');
			$user_shop_mobile = array_column($result, 'user_shop_mobile');
			$user_shop_email = array_column($result, 'user_shop_email');
			$user_shop_web = array_column($result, 'user_shop_web');
			$imagepath = array_column($result, 'imagepath');
		  echo $imagepath[0];
		   ?>
		    
			 <div class="container-fluid bttm">
        <div class="container">
        <div class="row row_top">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="box_shodow ">
					<div class="img_box">
						<img src="img/category/13BGCTY5-1_1516349f.jpg" class="img-responsive" alt="clothes">
							<div class="img_text_opcity"><a href=""><?php echo $user_category[0]; ?></a></div>
                                <div class="overlay"></div>
                                </div>
                                	</div>
                                    	</div>
                                    
                                    
                                 
           <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 top_bottom">
     <div class=""> <span class="glyphicon glyphicon-phone"></span> +91- <?php echo $user_shop_mobile[0]; ?></div>
           <div class="top_icon"> <span class="glyphicon glyphicon-envelope"></span> <?php echo $user_shop_email[0]; ?></div>
           <div class="top_icon1"> <?php echo $user_shopname[0]; ?></div>
        </div>
           </div>
        	</div>
            	</div>
				        
          <div class="container-fluid">
        <div class="container">
        <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 toggle_menu">
        <button class="accordion menu_bottom">Send Enquiry</button>
<div class="panel">
<p>Demo 1</p>
<p>Demo 1</p>
<p>Demo 1</p>
<p>Demo 1</p>
</div>
<button class="accordion menu_bottom">Write review</button>
<div class="panel">
<p>Demo 1</p>
<p>Demo 1</p>
<p>Demo 1</p>
<p>Demo 1</p>
</div>

<button class="accordion menu_bottom">Rs.</button>
<div class="panel">
<p>Demo 1</p>
<p>Demo 1</p>
<p>Demo 1</p>
<p>Demo 1</p>
</div>

<button class="accordion menu_bottom">Category </button>
<div class="panel">
<p>Demo 1</p>
<p>Demo 1</p>
<p>Demo 1</p>
<p>Demo 1</p>
</div>
<button class="accordion menu_bottom">Functional </button>
<div class="panel">
<p>Demo 1</p>
<p>Demo 1</p>
<p>Demo 1</p>
<p>Demo 1</p>
</div>
<button class="accordion menu_bottom">Services </button>
<div class="panel">
<p>Demo 1</p>
<p>Demo 1</p>
<p>Demo 1</p>
<p>Demo 1</p>
</div>
<button class="accordion menu_bottom">Mode of payment </button>
<div class="panel">
<p>Demo 1</p>
<p>Demo 1</p>
<p>Demo 1</p>
<p>Demo 1</p>
</div>
<button class="accordion menu_bottom">Other Location</button>
<div class="panel">
<p>Demo 1</p>
<p>Demo 1</p>
<p>Demo 1</p>
<p>Demo 1</p>
</div>


  </div>
  <script src="js/rating.js"></script>
  <script>
  
 
 
  
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
}
</script>

<input type="hidden" id="speedrate" value="">
<input type="hidden" id="qualityrate" value="">
<input type="hidden" id="pricerate" value="">
  		
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 riht">
        <div class="bener_im"><img src="img/banner/header-2.jpg" class="img-responsive img_2" /></div>
        <div class="cabs">Cabs</div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 leave">
        <div class="bottm_box">Leave a Review</div>
        
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pdd">
        <div class="">Speed</div>
        <div class="margi_tp">Quality </div>
        <div class="margi_tp">Price</div>

        </div>
        
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 highlight_star" id="highlight_starspeed">
          <ul data-id = <?php echo $user_roleid[0]; ?> data-rating =<?php echo $user_userid[0]; ?>>
              <li class="">&#9733;</li> 
              <li class="">&#9733;</li> 
              <li class="">&#9733;</li> 
              <li class="">&#9733;</li> 
              <li class="">&#9733;</li>  
			  </ul>
  
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 highlight_star" id="highlight_starsquality">
		 <ul data-id = <?php echo $user_roleid[0]; ?> data-rating =<?php echo $user_userid[0]; ?>>
              <li class="">&#9733;</li> 
              <li class="">&#9733;</li> 
              <li class="">&#9733;</li> 
              <li class="">&#9733;</li> 
              <li class="">&#9733;</li>  
			  </ul>   
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 highlight_star" id="highlight_starsprice">
        <ul data-id = <?php echo $user_roleid[0]; ?> data-rating =<?php echo $user_userid[0]; ?>>
              <li class="">&#9733;</li> 
              <li class="">&#9733;</li> 
              <li class="">&#9733;</li> 
              <li class="">&#9733;</li> 
              <li class="">&#9733;</li>  
			  </ul>
        </div>
     
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pdd">Comment</div>
         <textarea name="message"  id="ucomment" rows="8" cols="92"></textarea>
        
        <div class="">Name*</div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pdd">
        <input name="uname"  id="uname"class="search_mial1" placeholder="" type="text">
        </div>
        <div class="">Email*</div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pdd">
        <input name="search" name="uemail"  id="uemail" class="search_mial1" placeholder="" type="text">
        </div>
        <div class="">Website</div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pdd">
        <input name="search" name="uweb" id="uweb" class="search_mial1" placeholder="" type="text">
        </div> 
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 pdd">
    <div class="">
	 <button class="btn btn-custom font_search flot_r2" onclick="placeReview()" type="button">Submit Your Review</button>
   
	</div>
    <div class="forget">Forget Password?</div>
    </div>
		</div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-12">
        <div class=""><img src="img/add/add1.png" class="img-responsive img_3" /></div>
        
        <div class=""><img src="img/add/add1.png" class="img-responsive img_3" /></div>
        <div class=""><img src="img/add/add1.png" class="img-responsive img_3" /></div>

        <div class=""><img src="img/add/add1.png" class="img-responsive img_3" /></div>

        <div class=""><img src="img/add/add1.png" class="img-responsive img_3" /></div>

        </div>
        
        </div>
        	</div>
        </div><br>
		
		
		   <?php
		   
            break;
				
				case "loginUser":
				 if(!empty($_POST['email'])){
					 $email =$_POST['email'];
					 $password =$_POST['pass'];
					
				
					 $login = $bl->login("t_user",$email,$password,"email","password");
					 
				   if($login){
					
					   echo "OK";
					 
					}
					  else{
                   
					echo "ERR";
                    
                }
					 
				 }
		    else{
                
				echo "Some problem occurred, please try again";
             }
			 break;
			 
			 	case "placereview":
				 if(!empty($_POST['user_id'])){
					echo "userid=>". $user_id =$_POST['user_id'];
					echo  "userroleid=>". $userroleid =$_POST['userroleid'];
					echo  $uweb =$_POST['uweb'];
					 echo $uemail =$_POST['uemail'];
					 echo $uname =$_POST['uname'];
					echo  $ucomment =$_POST['ucomment'];
					echo  $price =$_POST['price'];
					 echo $quality =$_POST['quality'];
					echo  $speed =$_POST['speed'];
					echo  $searcheduserroleid =$_POST['searcheduserroleid'];
					echo  $searchuser_id =$_POST['searchuser_id'];
					 $userData = array(
                    'userid' => $_POST['searchuser_id'],
                    'roleid' => $_POST['searcheduserroleid'],
                    'speedrate' => $_POST['speed'],
					'pricerate' => $_POST['price'],
                    'qualityrate' => $_POST['quality'],
					'ratedbyid' => $_POST['user_id'],
					'comment' => $_POST['ucomment'],
					'name' => $_POST['uname'],
					'email' => $_POST['uemail'],
					'website' => $_POST['uweb'],
					'ratedbyroleid' => $_POST['userroleid']);
					
					
				$tblName = 't_rat';
				 $insert = $blLoad->placereview($tblName,$userData);
			     if($insert){
                   echo  "Your review  has been placed successfully.";
                }else{
                  
                     echo 'Some problem occurred, please try again.';
                }
					 
				 }
		    else{
                
				echo "Some problem occurred, please try again";
             }
			 break;
       
            
        default:
            echo '{"status":"INVALID"}';
    }
}