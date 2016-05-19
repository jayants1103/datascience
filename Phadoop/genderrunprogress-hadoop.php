<!DOCTYPE html>
<html>
<head>
<title>Data Sciences</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript">
var dummy="";
var valeur = 0;
function progress(){
		document.getElementById("status").innerHTML="here..";
		var ajax = new XMLHttpRequest();
		var value=10;
		ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			document.getElementById("status").innerHTML = ajax.responseText;
			$('.progress-bar').css('width', value+'%').attr('aria-valuenow', 5);
			progressing();
	  	}
	};
		ajax.open("POST", "genderrunon-hadoop.php",true);
		ajax.send();
}

function progressing(){
	$.ajax({
			type: 'POST',
			async: false,
			url: 'genderrunon-hadoop2.php',
			success: function(data){
				if( data == "starting the gender count"){
					dummy=data;
					var txt2 = document.createElement("p");
					txt2.innerHTML=dummy;
					//$("#status").html(data['msg']);
					$("#button").after(txt2);
					valeur = valeur + 40;
			  		$('.progress-bar').css('width', valeur+'%').attr('aria-valuenow', valeur);
				}
				else if( data == dummy ){
					setTimeout(function(){
							progressing();
							console.log("New Call>>"+dummy);

						}, 1000);
				}
				else
				{	
					dummy=data;
					var txt2 = document.createElement("p");
					txt2.innerHTML=dummy;
					//$("#status").html(data['msg']);
					$("#button").after(txt2);
					valeur = valeur + 5;
			  		$('.progress-bar').css('width', valeur+'%').attr('aria-valuenow', valeur);
					setTimeout(function(){
							progressing();
							console.log("New Call>>"+dummy);

						}, 1000);
					
					
				}	
			}
		});
}
function readResults() {
	$.ajax({
			type: 'POST',
			async: false,
			url: 'readresults-hadoop.php',
			success: function(data){
				var txt2 = document.createElement("p");
				txt2.innerHTML=data;
				$("#button").after(txt2);
				valeur = 100;
		  		$('.progress-bar').css('width', valeur+'%').attr('aria-valuenow', valeur);
			}
	});
}
</script>
</head>
<body onload="progress();">

<h3>Application run in progress</h3>

<div class="progress" style="margin: 50px">
  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
  </div>
</div>


<p id="status">Just starting..</p>
<p id="test">Click the link below to monitor the progress of the job.</p>
<a href="http://172.24.42.19:8088" target="_blank">Click here...</a> <br>
<button id="button" onclick="readResults()">Results</button>


</body>
</html>

