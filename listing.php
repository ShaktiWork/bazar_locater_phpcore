<?php 

  $state=$_GET['state'];
 $city=$_GET['city'];
  $region=$_GET['region'];
  $category=$_GET['category'];
  $subcategory=$_GET['subcategory'];


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Local Bazaar</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="css/style.css" />

<link rel="stylesheet" href="css/discoins.css" />

 <script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/loaddropdown.js"></script>


 
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      margin: auto;
  }
  input[type=text], input[type=password] {
    width: 100%;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}/*
button {
    background-color:#b93101 !important;
    color: white;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}*/

 
			h2 {background-color: #CCC; padding: 15px; text-align: center;}
			h4 {color: #F60; margin-bottom: 0}
			ul {margin:0; padding:0;}
			li{cursor:pointer; list-style-type: none; display: inline-block; color: #F0F0F0; text-shadow: 0 0 1px #666666; font-size:1.4em;}
			p {text-align: justify;}
			.content {line-height:1.8em;}
			.post {border-bottom: #f0f0f0 1px solid; padding: 15px 5px;}
            .highlight, .selected {color:#F4B30A; text-shadow: 0 0 1px #F48F0A;}
  </style>
  
  <script>
  $( document ).ready(function() {
       // loadSerchResult();
		SerchResult();
   });
   
   
    function SerchResult() {
   
   var state=$("#state").val();
   var subcategory=$("#subcategory").val();
   var region=$("#region").val();
   var category=$("#category").val();
   var city=$("#city").val();
   
     $.post('BLSearchResultAction', {type:'serchresult',subcategory: '<?php echo $subcategory?>',state:'<?php echo $state?>',city:'<?php echo $city?>',region:'<?php echo $region?>',category:'<?php echo $category?>'}, function (data){
     console.log(data);
	 //$("#serchresult").html('');
	 $("#serchresult").html(data);
	});
   }
   
   
   
   function loadSerchResult() {
   
   var state=$("#state").val();
   var subcategory=$("#subcategory").val();
   var region=$("#region").val();
   var category=$("#category").val();
   var city=$("#city").val();
   
     $.post('BLSearchResultAction', {type:'serchresult',subcategory: subcategory,state:state,city:city,region:region,category:category}, function (data){
     //console.log(data);
	 $("#serchresult").html('');
	 $("#serchresult").html(data);
	});
   }
   
   function loaddetails(userId,roleId){
	   alert(userId)
	   alert(roleId)
	     $.post('BLUserDetail', {type:'loadDetail',userId: userId,roleId:roleId}, function (data){
         console.log(data);
	  $("#serchresult").hide();
	  $("#laoddetail").html(data);
	});
   }
   
   function placeReview(){
	    var speed = $("input[name='speed']:checked").val();
		 var quality = $("input[name='quality']:checked").val();
		  var price = $("input[name='price']:checked").val();
		  alert(speed)
		   alert(quality)
		    alert(price)
   }
//alert('<?php echo $subcategory; ?>')
  </script>
</head>
<body>
			

			<?php  include 'header.php'; ?>
                    
                    <div id="serchresult">
					</div>
					<div id="laoddetail"></div>
                   
                            
                            
<div class="container-fluid footer1">
<div class="container">
<div class="row mrg_top_bottom">
<div class="col-lg-9 col-md-8 col-sm-9 col-xs-12 footer_left1">
<div class="footer_contact">
<div class="footer_contact_link"><a href="">About us</a></div>
<div class="footer_contact_link"><a href="">Contact us</a></div>
<div class="footer_contact_link"><a href="">Advertise</a></div>
<div class="footer_contact_link"><a href="">Career</a></div>
<div class="footer_contact_link"><a href="">Testimonials</a></div>
<div class="footer_contact_link"> <a href="">Feedback</a></div>
</div>
</div>
<div class="col-lg-3 col-md-4 col-sm-3 col-xs-12 icon_top">
<div class="main_footer_social">
<div class="social_footer facebook"><a href="#"><img src="img/social/facebook.jpg" class="img-responsive social_icon" alt="facebook"></a></div>
<div class="social_footer twitter"><a href="#"><img src="img/social/googleplas.jpg" class="img-responsive social_icon" alt="twitter"></a></div>
<div class="social_footer pintrest"><a href="#"><img src="img/social/pinterst.jpg" class="img-responsive social_icon" alt="pinterest"></a></div>
<div class="social_footer googleplas"><a href="#"><img src="img/social/twitter.jpg" class="img-responsive social_icon" alt="googleplas"></a></div>
</div>

</div>
</div>
	</div>
    	</div>
        <div class="container-fluid footer1">
        <div class="container">
		<div class="row footer-top"> 
<div class="col-lg-9 col-md-8 col-sm-9 col-xs-12 footer-top">
<div class="city">
<div class="city_name"><a href="">Ahmedabad /</a></div> 
<div class="city_name"><a href="">Bangalore /</a></div>
<div class="city_name"><a href=""> Chandigarh /</a></div>
<div class="city_name"><a href=""> Chennai /</a></div>
<div class="city_name"><a href=""> Coimbatore / </a></div>
<div class="city_name"><a href="">Delhi /</a></div>
<div class="city_name"><a href=""> Delhi-NCR /</a></div>
<div class="city_name"><a href=""> Ernakulam /</a></div> 
<div class="city_name"><a href="">Goa / </a></div>
<div class="city_name"><a href="">Hyderabad / </a></div>
<div class="city_name"><a href="">Indore /</a></div>
<div class="city_name"><a href=""> Jaipur /</a></div>
<div class="city_name"><a href=""> Kolkata /</a></div>
<div class="city_name"><a href="">Mumbai / </a></div>
<div class="city_name"><a href="">Mysore / </a></div>
<div class="city_name"><a href="">Nagpur /</a></div>
<div class="city_name"><a href=""> Nashik / </a></div> 
<div class="city_name"><a href="">Surat / </a></div>
<div class="city_name"><a href="">Vadodara /</a></div>
<div class="city_name"><a href=""> Vizag</a></div>
</div>
</div>
<div class="col-lg-3 col-md-4 col-sm-3 col-xs-12">
<div class="main_app">
<div class="main_app_image google_play"><a href="#"><img src="img/social/2000px-Get_it_on_Google_play.jpg" class="img-responsive footer_img_height google_img" alt="google_play"></a></div>
<div class="main_app_image app_store"><a href="#"><img src="img/social/Available-on-the-app-store-badge.jpg" class="img-responsive image_border footer_img_height1" alt="app_store"></a></div>
</div>
</div>
</div>
	
        
        
       
        
        <div class="row footer2">
        <div class="copy_right">Copyrights 2008-2015. All Rights Reserved. <span class="text"><a href="#">Privacy</a></span> | 
        <span class="text"><a href="#">Terms</a></span></div>
        	</div>
            	</div>
                </div>                            
                        
</body>
</html>
