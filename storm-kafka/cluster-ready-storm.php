<!DOCTYPE html>
<html>
<head>
<title>Data Sciences</title>
</head>
<body>

<a href="/index.html">
	<img src="house-home.jpg" style="width:50px;height:50px;">
</a>
<h1>Storm Cluster is ready...run an application</h1>

<h3>the storm cluster is now up</h3>
<p>You can access the cluster at...</p>
<a href="http://172.24.42.7:8080" target="_blank">Storm UI</a> <br>

<form method="POST" action="genderrunprogress-storm.php">
	<h3>Gender Count</h3>
	<p>In the following sample count example, we shall count the number of Females and Males as listed in the sample file.</p>
	<a href="/data/sample.txt" target="_blank">Sample file containing records</a><br>
	<p>The file contains ~15m records. Each row has a name, gender, age and the programming language they prefer.<br></p>
	<button>Run Gender Count</button>
</form>

<form method="POST" action="languagerunprogress-storm.php">
	<h3>Language Gender Count</h3>
	<p>In the following sample count example, we shall count the number of Females and Males as who like Python as a programming langauge.</p>
	<a href="/data/sample.txt" target="_blank">Sample file containing records</a><br>
	<p>The file contains ~15m records. Each row has a name, gender, age and the programming language they prefer.<br></p>
	<button>Run Gender Count</button>
</form>

</body>
</html>
