
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
			 $data_jason['Result']=$blsearch->searchResult($state,$city,$region,$category,$subcategory);
		     echo json_encode($data_jason);
		    break;
			 
			 break;
		
		
		
		
        default:
            echo '{"status":"INVALID"}';
    }
}