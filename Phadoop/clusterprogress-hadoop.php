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
			progressing();
	  	}
	};
		ajax.open("POST", "clusteron-hadoop.php",true);
		ajax.send();
}

function progressing(){
	$.ajax({
			type: 'POST',
			async: false,
			url: 'clusteron-hadoop2.php',
			success: function(data){
				if( dummy != data)
				{
					dummy=data;
					var txt2 = document.createElement("p");
					txt2.innerHTML=dummy;
					$("#status").after(txt2);
					valeur = valeur + 3;
			  		$('.progress-bar').css('width', valeur+'%').attr('aria-valuenow', valeur);
					if (data !=  "complete"){
						setTimeout(function(){
							progressing();
							console.log("New Call>>"+dummy);

						}, 1000);
					}
					
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
		if ( dummy == "complete" )
		{
			valeur = 100;
			$('.progress-bar').css('width', valeur+'%').attr('aria-valuenow', valeur);
			setTimeout(function(){window.location.href = 'cluster-ready-hadoop.php';}, 2000);	
		}
}
</script>
</head>
<body onload="progress();">

<h3>Hadoop Cluster is being setup</h3>

<p>The cluster will have 1 Master and <?php echo $_GET["nodes"]; ?> slaves.</p><br>
<div class="progress" style="margin: 50px">
  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
  </div>
</div>


<p id="status">Just starting..</p>
<p id=test"></p>


</body>
</html>

