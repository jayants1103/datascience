<!DOCTYPE html>
<html>
<head>
<title>Data Sciences</title>
</head>
<body>

<h1>Results</h1>

<?php
	$output=exec("bash run-genderlanguagecount-hadoop > /tmp/tmp.out");
	echo $output;
	
?>
</body>
</html>
