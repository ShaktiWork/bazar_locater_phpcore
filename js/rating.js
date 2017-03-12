 $(document).ready(function(){
	$('.highlight_star li').mouseout(function(){	
			$(this).siblings().andSelf().removeClass('selected highlight')	
		}).mouseover(function(){
			
				$(this).siblings().andSelf().removeClass('selected');
				$(this).prevAll().andSelf().addClass('highlight');			
			})
			
			$('#highlight_starspeed li').click(function(){
			
			$(this).prevAll().andSelf().addClass('selected');
			var parent = $(this).parent();		
			var oldrate =  $('li.selected:last', parent).index();
			parent.data('rating',(oldrate+1))
			data = new Object();
			data.id = parent.data('id');
			data.rating = parent.data('rating')
			$("#speedrate").val(data.rating);
			
			
			jQuery('#highlight_starspeed ul').mouseout(function(){ 
		var rating = $(this).data('rating');
		if( rating > 0)	{
			$('li:lt('+rating+')',this).addClass('selected');
		}
	})
  })	
  
  
  $('#highlight_starsprice li').click(function(){
			
			$(this).prevAll().andSelf().addClass('selected');
			var parent = $(this).parent();		
			var oldrate =  $('li.selected:last', parent).index();
			parent.data('rating',(oldrate+1))
			data = new Object();
			data.id = parent.data('id');
			data.rating = parent.data('rating')
			$("#pricerate").val(data.rating);
			
			jQuery('#highlight_starsprice ul').mouseout(function(){ 
		var rating = $(this).data('rating');
		if( rating > 0)	{
			$('li:lt('+rating+')',this).addClass('selected');
		}
	})
  })	
  
    $('#highlight_starsquality li').click(function(){
			
			$(this).prevAll().andSelf().addClass('selected');
			var parent = $(this).parent();		
			var oldrate =  $('li.selected:last', parent).index();
			parent.data('rating',(oldrate+1))
			data = new Object();
			data.id = parent.data('id');
			data.rating = parent.data('rating')
			$("#qualityrate").val(data.rating);
			jQuery('#highlight_starsquality ul').mouseout(function(){ 
		var rating = $(this).data('rating');
		if( rating > 0)	{
			$('li:lt('+rating+')',this).addClass('selected');
		}
	})
  })
		
		
  });
  