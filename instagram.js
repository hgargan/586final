
    
$(function() {
	
	var apiurl = "https://api.instagram.com/v1/tags/shenandoah/media/recent?access_token=824260001.1fb234f.ab5c2f35801444069fe3ad55a664ff60&callback=?"
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

				html += '<div class="col-xs-12 col-sm-6">'
				html += '<div class="instapicture">'
				html += '<p class="instacaption"><a href="http://instagram.com/' + data.user.username +'" target=_"blank>' + data.user.username + '</a>: ' + data.caption.text + '</p>';
				html += '<a href="' + data.link + '" target=_"blank"><img src ="' + data.images.low_resolution.url + '"></a>'
				
					html += '</div>'
					html += '</div>'
						
				   });
			

			
		html += '<p><center><a href="https://instagram.com/explore/tags/shenandoahnationalpark" target="_blank">See more >></a></center></p>'
			html+='</div>'
			console.log(html);
			$("#results").append(html);
			
			
			
		}
		
		
                
               
 });
 


		
	
