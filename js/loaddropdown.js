  $( document ).ready(function() {
         loadState();
		 loadCategory();
       });
	   
	   function loadState () {
             $.post('BLloadropdownAction', {type:'loadState'}, function (data){
               var dataObj = JSON.parse(data);
               $.each(dataObj.State, function(key,value){
              // console.log(value.city_state);
                $('#state').append(
              $('<option></option>').val(value.city_state).html(value.city_state)
          );
       });
		 
	});
   }
   
    function loadCity () {
		     $("#city").html("");
		     var state=$("#state").val();
			 $.post('BLloadropdownAction', {type:'loadCity',state:state}, function (data){
				 //console.log(data)
               var dataObj = JSON.parse(data);
               $.each(dataObj.City, function(key,value){
              console.log(value.city_name);
                $('#city').append(
              $('<option></option>').val(value.city_name).html(value.city_name)
          );
       });
		 
	});
   }
   
   function loadRegion () {
	  
		     $("#region").html("");
		      var state=$("#state").val();
			  var city=$("#city").val();
			 $.post('BLloadropdownAction', {type:'loadRegion',state:state,city:city}, function (data){
				 //console.log(data)
               var dataObj = JSON.parse(data);
               $.each(dataObj.Region, function(key,value){
               console.log(value.region);
                $('#region').append(
              $('<option></option>').val(value.region).html(value.region)
          );
       });
		 
	});
   }
   
   
   function loadCategory () {
	  
			 $.post('BLloadropdownAction', {type:'loadCategory'}, function (data){
				 //console.log(data)
               var dataObj = JSON.parse(data);
               $.each(dataObj.Category, function(key,value){
               console.log(value.categoryname);
                $('#category').append(
              $('<option></option>').val(value.categoryname).html(value.categoryname)
          );
       });
		 
	});
   }
	 
	 
	 function loadSubCategory () {
		      var category = $("#category").val();
	         // alert(category)
			 $.post('BLloadropdownAction', {type:'loadSubCategory',category:category}, function (data){
				 //console.log(data)
               var dataObj = JSON.parse(data);
               $.each(dataObj.SubCategory, function(key,value){
               console.log(value.subcategoryname);
                $('#subcategory').append(
              $('<option></option>').val(value.subcategoryname).html(value.subcategoryname)
          );
       });
		 
	});
   }
	 
	 
	 function loadListing(){
		 /* $.ajax({
        method: 'GET',
        url: 'listing',
        data: {state: "mp", city: "up"}
    }).done(function (msg) {
        $("#searchBarTop").html(msg);
        $("#searchBarCenter").html(msg);
    });
	loadSerchResult
	
	if (download) {
   		var durl = '<s:url value="/report/loginRptReport" />?profileId='
   				+ profileId + "&type=" + type + "&userId=" + userId
   				+"&stDate="+start_date+"&endDate="+end_date
   				+ "&userName="+userName+ "&download=true&s360securetoken="+'<s:property value="#session.s360securetoken"/>';
   		window.open(durl);
   	}
	*/
	var state=$("#state").val();
    var city=$("#city").val();
	var region=$("#region").val();
	var category=$("#category").val();
	var subcategory=$("#subcategory").val();
	var url = 'listing?state='+state+"&city="+city+"&region="+region+"&category="+category+"&subcategory="+subcategory;
     window.location.href = url;
	 loadSerchResult();
	
	
	
	
	 }
	 
	 
	
	 
	 
	