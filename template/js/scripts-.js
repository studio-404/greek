var PROTOCOL = "http://";
var LANG = $(".lang_div a").attr("data-currentlang");
var WEBSITE = PROTOCOL+document.domain;
var AJAX_REQUEST_URL = WEBSITE+"/"+LANG+"/ajax";

$(document).on("click","#register-button",function(){
	var namelname = $("#namelname").val();
	var email = $("#email").val();
	var password = $("#password").val();
	var repeat_password = $("#repeat_password").val();
	var result = "";

	if(LANG=="ge"){
		$("#resalt").html('<font color="red">მოთხოვნა იგზანება...</font>').fadeIn("slow");
	}else{
		$("#resalt").html('<font color="red">Please wait...</font>').fadeIn("slow");
	}

	if(typeof(namelname) == "undefined" || namelname==null || namelname==""){
		if(LANG=="ge"){
			$("#resalt").html('<font color="red">გთხოვთ შეავსოთ სახელი გვარი-ის ველი !</font>').fadeIn("slow");	
		}else{
			$("#resalt").html('<font color="red">Please fill firstname and lastname field !</font>').fadeIn("slow");	
		}
	}else if(typeof(email) == "undefined" || email==null || email==""){
		if(LANG=="ge"){
			$("#resalt").html('<font color="red">გთხოვთ შეავსოთ ელ-ფოსტის-ის ველი !</font>').fadeIn("slow");	
		}else{
			$("#resalt").html('<font color="red">Please fill email field !</font>').fadeIn("slow");	
		}
	}else if(typeof(password) == "undefined" || password==null || password==""){
		if(LANG=="ge"){
			$("#resalt").html('<font color="red">გთხოვთ შეავსოთ პაროლის-ის ველი !</font>').fadeIn("slow");	
		}else{
			$("#resalt").html('<font color="red">Please fill password field !</font>').fadeIn("slow");	
		}
	}else if(password!=repeat_password){
		if(LANG=="ge"){
			$("#resalt").html('<font color="red">პაროლები არ ემთხვევა ერთმანეტს !</font>').fadeIn("slow");	
		}else{
			$("#resalt").html('<font color="red">Passwords do not match !</font>').fadeIn("slow");	
		}
	}else{
		$.post(AJAX_REQUEST_URL,{ registerme:true, n:namelname, e:email, p:password },function(r){
			if(r=="Error" && LANG=="ge"){
				$("#resalt").html('<font color="red">მოხდა შეცდომა !</font>').fadeIn("slow");	
			}else if(r=="Error" && LANG=="en"){
				$("#resalt").html('<font color="red">Error !</font>').fadeIn("slow");	
			}else if(r=="Done" && LANG=="ge"){
				$(".form_1").val('');
				$("#resalt").html('<font color="green">რეგისტრაცია წარმატებით დასრულდა !</font>').fadeIn("slow");	
			}else if(r=="Done" && LANG=="en"){
				$(".form_1").val('');
				$("#resalt").html('<font color="green">You have registered successfully !</font>').fadeIn("slow");	
			}
		});
	}

});

$(document).on("click","#login-button", function(){
	var username = $("#login-username").val();
	var password = $("#login-password").val();
	var param = urlParamiters();
	if(LANG=="ge"){
		$("#resalt2").html('<font color="red">მოთხოვნა იგზანება...</font>').fadeIn("slow");
	}else{
		$("#resalt2").html('<font color="red">Please wait...</font>').fadeIn("slow");
	}

	if(typeof(username) == "undefined" || username==null || username==""){
		if(LANG=="ge"){
			$("#resalt2").html('<font color="red">გთხოვთ შეავსოთ ელ-ფოსტის ველი !</font>').fadeIn("slow");
		}else{
			$("#resalt2").html('<font color="red">Please fill email field !</font>').fadeIn("slow");
		}
	}else if(typeof(password) == "undefined" || password==null || password==""){
		if(LANG=="ge"){
			$("#resalt2").html('<font color="red">გთხოვთ შეავსოთ პაროლის ველი !</font>').fadeIn("slow");
		}else{
			$("#resalt2").html('<font color="red">Please fill password field !</font>').fadeIn("slow");
		}
	}else{
		$.post(AJAX_REQUEST_URL,{ logintry:true, e:username, p:password },function(r){
			if(r=="Done"){ 
				if(param["docid"]!=""){
					location.href = PROTOCOL+document.domain+"/"+LANG+"/document="+param["docid"];
				}else{
					location.reload();
				}
			}else{
				if(LANG=="ge"){
					$("#resalt2").html('<font color="red">მომხმარებლის სახელი ან პაროლი არასწორია !</font>').fadeIn("slow");	
				}else{
					$("#resalt2").html('<font color="red">Username or Password is wrong !</font>').fadeIn("slow");	
				}
			}
		});
	}
});

//
$(document).on("click","#search-button", function(){
	var key = $("#keyword").val();
	location.href = PROTOCOL+document.domain+"/"+LANG+"/keywords?search="+encodeURIComponent(key);
});

$(document).on("click",".signout", function(){
	$(this).append(" ...");
	$.post(AJAX_REQUEST_URL,{ signout:true },function(r){
		location.reload();
	});
});

$(document).on("click",".loadmore",function(){
	var type = $(this).attr("data-type");
	var from = $(this).attr("data-from");
	var to = $(this).attr("data-to");	
	var dlang = $(this).attr("data-dlang");	

	$(this).attr("data-from",(from + to));
	
	$.post(AJAX_REQUEST_URL, { loadmore:true, t:type, f:from, t2:to, l:dlang },function(r){
		if(r=="Empty"){
			if(LANG=="ge"){
				$(".loadmore").attr("href","javascript:void(0)").html("ჩანაწერი ვერ ნოიძებნა !");
			}else{
				$(".loadmore").attr("href","javascript:void(0)").html("Sorry, There is no more data !");
			}
		}else if(r=="Notin"){
			if(LANG=="ge"){
				$(".modal-title").html('შეტყობინება');
				$(".modal-text").html('გთხოვთ გაიაროთ ავტორიზაცია !');
			}else{
				$(".modal-title").html('Message');
				$(".modal-text").html('Please sign in !');
			}
			$("#message").modal('toggle');			
		}else{
			var obj = JSON.parse(r); 
			var html = "";
			for(var i = 0; i < obj.length; i++){
				if(type=="usefulllinks"){
					html += '<li><a href="'+obj[i].url+'" target="_blank">'+obj[i].title+'</a></li>';					
				}else{
					html += '<li><a href="'+WEBSITE+'/'+LANG+'/document?id='+obj[i].idx+'" target="_docs">'+obj[i].title+'</a></li>';
				}
			}
			$(".epigraphy-list").append(html);
		}
	});
});

$(document).on("click","#update-profile", function(){
	var namelname = $("#profile-namelname").val();
	var email = $("#profile-email").val();
	var gender = $("#profile-gender").val();
	var contactnumber = $("#profile-contactnumber").val();
	
	

	if(typeof(namelname) == "undefined" || namelname==null || namelname==""){
		if(LANG=="ge"){
			$("#profile-resalt").html('<font color="red">სახელი გვარის ველი სავალდებულოა !</font>').fadeIn("slow");	
		}else{
			$("#profile-resalt").html('<font color="red">Firstname and Lastname field is required !</font>').fadeIn("slow");	
		}
	}else{
		if(LANG=="ge"){
			$("#profile-resalt").html('<font color="red">მოთხოვნა იგზავნება ...</font>').fadeIn("slow");	
		}else{
			$("#profile-resalt").html('<font color="red">Please wait ...</font>').fadeIn("slow");	
		}
		$.post(AJAX_REQUEST_URL, { updateprofile:true, n:namelname, e:email, g:gender, c:contactnumber }, function(r){
			if(r=="Done"){
				location.reload();
			}
		});		
	}
	
});

$(document).on("click",".notsigned",function(){
	if(LANG=="ge"){
		$(".modal-title").html('შეტყობინება');
		$(".modal-text").html('გთხოვთ გაიაროთ ავტორიზაცია !');
	}else{
		$(".modal-title").html('Message');
		$(".modal-text").html('Please sign in !');
	}
	$("#message").modal('toggle');
});

$(document).on("click",".thumbnail",function(){
	var image = $(this).attr("data-image");
	$(".modal-text").html('<img src="'+image+'" alt="" width="100%" />');
	$("#message").modal('toggle');
});

$(document).on("click","#changepass-button",function(){
	var pwold = $("#password-old").val();
	var pwnew = $("#password-new").val();
	var pwrepeat = $("#password-repeat").val();

	if(
		(typeof(pwold)=="undefined" || pwold==null || pwold=="") || 
		(typeof(pwnew)=="undefined" || pwnew==null || pwnew=="") || 
		(typeof(pwrepeat)=="undefined" || pwrepeat==null || pwrepeat=="")
	){
		if(LANG=="ge"){
			$("#changepass-resalt").html('<font color="red">ყველა ველი სავალდებულოა !</font>').fadeIn("slow");	
		}else{
			$("#changepass-resalt").html('<font color="red">All fields is required !</font>').fadeIn("slow");	
		}
	}else if(pwnew!=pwrepeat){
		if(LANG=="ge"){
			$("#changepass-resalt").html('<font color="red">პაროლები არ ემთხვევა ერთმანეთს !</font>').fadeIn("slow");	
		}else{
			$("#changepass-resalt").html('<font color="red">Passwords do not match !</font>').fadeIn("slow");	
		}
	}else{
		$.post(AJAX_REQUEST_URL, { updatepass:true, o:pwold, n:pwnew, r:pwrepeat }, function(r){
			if(r=="owrong"){
				if(LANG=="ge"){
					$("#changepass-resalt").html('<font color="red">ძველი პაროლი არასწორია !</font>').fadeIn("slow");	
				}else{
					$("#changepass-resalt").html('<font color="red">Old Password is wrong !</font>').fadeIn("slow");	
				}
			}else if(r=="Done"){
				if(LANG=="ge"){
					$("#changepass-resalt").html('<font color="red">ოპერაცია წარმატებით დასრულდა !</font>').fadeIn("slow");	
				}else{
					$("#changepass-resalt").html('<font color="red">Password is updated !</font>').fadeIn("slow");	
				}
			}else{
				if(LANG=="ge"){
					$("#changepass-resalt").html('<font color="red">მოხდა შეცდომა !</font>').fadeIn("slow");	
				}else{
					$("#changepass-resalt").html('<font color="red">Something went wrong !</font>').fadeIn("slow");	
				}
			}
		});
	}
});

function submitme(e,hit_id){ 
	if (e.keyCode == 13) {
        $("#"+hit_id).click();
    }
}

function remo(e){
	$(".usersnavigation li").removeClass("active"); 
	$(e).parent().addClass("active");
}

function urlParamiters()
{
	var query_string = new Array();
	var query = window.location.search.substring(1);
	var vars = query.split("&");
	for (var i=0;i<vars.length;i++) {
		var pair = vars[i].split("=");
		if (typeof query_string[pair[0]] === "undefined") {
		  query_string[pair[0]] = pair[1];
		} else if (typeof query_string[pair[0]] === "string") {
		  var arr = [ query_string[pair[0]], pair[1] ];
		  query_string[pair[0]] = arr;
		} else {
			if(query_string.length){
		  		query_string[pair[0]].push(pair[1]);
			}else{
				query_string[pair[0]] = '';
			}
		}
	} 
	return query_string;		
}
