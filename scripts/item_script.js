/**
 * @author Sajib Acharya
 */

window.onload = initPage;

function initPage(){
	setTimeout(function() {
		$('#myModal').modal('show');
	}, 3000);
	
	var SITE_URL = 'http://wowslider.com/';
	
	var _gaq = _gaq || [];

	_gaq.push(['_setAccount', 'UA-25854704-1']);
	_gaq.push(['_setDomainName', '.wowslider.com']);
	_gaq.push(['_setAllowLinker', true]);
	_gaq.push(['_setAllowHash', false]);

	if(document.cookie.match("(^|;\\s)__utma") && !/utmcsr=\(direct\)/.test(unescape(document.cookie))) {
		_gaq.push(
			['_setReferrerOverride', ''],
			['_setCampNameKey', 'aaan'], 
			['_setCampMediumKey', 'aaam'], 
			['_setCampSourceKey', 'aaas'], 
			['_setCampTermKey', 'aaat'], 
			['_setCampContentKey', 'aaac'], 
			['_setCampCIdKey', 'aaaci']
		);
	}

	_gaq.push(['_trackPageview']);  

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	
	var google_conversion_id = 1071863997;
	var google_conversion_language = "en";
	var google_conversion_format = "3";
	var google_conversion_color = "ffffff";
	var google_conversion_label = "YwhdCOff5AIQvbGN_wM";
	var google_conversion_value = 0;
	
	postButton = document.getElementById("post_button_id");
	
	postButton.onclick = function(){
		checkComment();
	};
}

function checkComment(){
	var commentText = document.getElementById("comment_input_id").value;
	
	if(commentText.trim() == '' || commentText.trim() == 'null'){
		alert("Put comment first");
	}
	else{
		postComment(commentText);
	}
}

function postComment(commentText){
	request =  createRequest();
	
	if(request == null){
		alert("Unable to create request. Check your internet connection or contact Systems Administrator.");
		return;
	}
	
	var bikeID = document.getElementById("input_bike_id").value;
	var url = "internals/postCommentRequest.php?comment=" + encodeURIComponent(escape(commentText)) + "&bike_id=" + encodeURIComponent(escape(bikeID));
	
	request.open("GET", url, true);
	request.onreadystatechange = postCommentResponse;
	request.send(null);
}

function postCommentResponse(){
	if(request.readyState == 4){
		if(request.status == 200){
			if(request.responseText == 'success'){
				if(document.getElementById("no_comments_fieldset_id") != null){
					document.getElementById("no_comments_fieldset_id").remove();
				}
				
				var bikeID = document.getElementById("input_bike_id").value;
				var commentText = document.getElementById("comment_input_id").value;
				var theCommentTagString = "<div class=\"form-group\" style=\"padding:14px;\"><fieldset class=\"bg-success\"><p class=\"text-info\">" + commentText + "</p><p class=\"blockquote-reverse text-muted\"><mark><small>- Unknown</small></mark></p></fieldset></div>";
				document.getElementById("comments_start_id").innerHTML += theCommentTagString;
			}
			else{
				alert("could not post comment\n\n");
			}
		}
		else{
			alert("Request status was recieved Incorrect. Please try again or contact Systems Administrator." + request.status);
		}
	}
}

function createRequest(){
	try{
		request = new XMLHttpRequest();
	}
	catch(tryMS){
		try{
			request = new ActiveXObject("Msxm12.XMLHTTP");
		}
		catch(otherMS){
			try{
				request = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(failed){
				request = null;
			}
		}
	}
	return request;
}
