$(document).ready(function(){
	$("button").click(function(){
		$.get("text.txt","",function(data, status){
		},"text");
	});
});