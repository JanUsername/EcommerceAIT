$(document).ready(function(){

	$("#searchForm").submit(function () {
		console.log("What are you looking for?!?");	
	});

	$("#btn").click(function () {
		alert("Hello Greta!");
	});

});


function doAjax() {
		ajax = callAjax();
		ajax.done(function (result) {
		cat = $.parseJSON(result);
		console.log(cat);
		$.each(cat, function (i,item) {
			$("#list").append('<li>'+item+'</li>');
			
		});
	});
			
		ajax.fail(function () {alert("FAIL!");});

};

function callAjax() {

	return 	$.ajax({
		url: "Scripts/handler.php",
      data:{method: 'connector'},
      //dataType: "json",
      type: 'POST',
	});
		


};








