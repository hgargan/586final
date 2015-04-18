// JavaScript Document


//Use this url below to get your access token
//https://instagram.com/oauth/authorize/?display=touch&client_id=15a728572bfb4ee59febfa625d0d6655&redirect_uri=http://henrygargan.com/586final&response_type=token 

//if you need a user id for yourself or someone else use:
//http://jelled.com/instagram/lookup-user-id

  $(document).ready(function() {
   $('.instapicture').each(function() {
    $(this).qtip({ // 
        content: {
            text: $(this).next() // WILL work, because .each() sets "this" to refer to each element
        },
     position: {
        my: 'bottom right',
        at: 'top right',
     },
        style: {
        classes: 'qtip-bootstrap qtip-shadow'
        }
        
});
  })
   
    
$(function() {
	
	var apiurl = "https://api.instagram.com/v1/tags/shenandoahnationalpark/media/recent?access_token=824260001.1fb234f.ab5c2f35801444069fe3ad55a664ff60&callback=?"
	var access_token = location.hash.split('=')[1];
	var html = ""
	
		$.ajax({
			type: "GET",
			dataType: "json",
			cache: false,
			url: apiurl,
			success: parseData
		});
				
		 
		function parseData(json){
			console.log(json);
			html+= '<div class="row">'
			$.each(json.data,function(i,data){
				html += '<div class="col-xs-12 col-sm-4 col-md-3 instapicture">'
				html += '<p class="instacaption">Caption: "'+ data.caption.text +'"</p>';
				html += '<a href="' + data.link + '" target=_"blank"><img src ="' + data.images.low_resolution.url + '"></a>'
				html += '</div>'
				
			});
			
			html+='</div>'
			console.log(html);
			$("#results").append(html);
			
			
			
		}
		
		
                
               
 });
 });
		
	
