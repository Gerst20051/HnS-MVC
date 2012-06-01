function jumpTo(path,confirmMessage) {
	var answer = confirm(confirmMessage);
	if (answer == 1) location.href = path;
}

$(document).ready(function(){
$("a#login").click(function(){ //home/auth/login
	$.get("home/auth/login", { username: $("input#username").val(), password: $("input#password").val()}, function(data){
		alert("Data: " + data);
	});
});

$("a#logout").click(function(){ //home/auth/logout
	$.get("home/auth/logout", function(data){
		alert("Data: " + data);
	});
});

$("button#signup").click(function(){

});
});