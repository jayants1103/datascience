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
		ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			document.getElementById("status").innerHTML = ajax.responseText;
			$('.progress-bar').css('width', valeur+'%').attr('aria-valuenow', 10);
			progressing();
	  	}
	};
		ajax.open("POST", "genderrunon-spark.php",true);
		ajax.send();
}
function progressing(){
	$.ajax({
			type: 'POST',
			async: false,
			url: 'genderrunon-spark2.php',
			success: function(data){
				if( data != ""){
					dummy=data;
					var txt2 = document.createElement("p");
					txt2.innerHTML= "The results is: "+dummy;
					$("#link").after(txt2);
					valeur = valeur + 100;
			  		$('.progress-bar').css('width', valeur+'%').attr('aria-valuenow', valeur);
				}
				else
				{
					setTimeout(function(){
							progressing();
							console.log("New Call>>"+dummy);

						}, 1000);	
				}	
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
<a id="link" href="http://172.24.42.5:8080" target="_blank">Click here...</a> <br>


</body>
</html>

