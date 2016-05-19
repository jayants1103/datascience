<!DOCTYPE html>
<html>
<head>
<title>Data Sciences</title>
</head>
<body>

<h1>Submit an application</h1>

<h3>The spark cluster is now up</h3>
<a href="http://172.24.42.5:8080" target="_blank">Spark Master URL</a> <br>
<p>Click the link to view the information about the Cluster. The user can see the number of workers, the memory in use by the nodes and the running or completed applications. </p>

<form method="POST" action="genderrunprogress-spark.php">
	<h3>Gender Count</h3>
	<p>In the following sample count example, we shall count the number of Females and Males as listed in the sample file.</p>
	<a href="/data/small.txt" target="_blank">Click here to view the sample file containing records</a><br>
	<p>The file contains 6 records. Each row has a name, gender, age and the programming language they prefer.<br> Spark breaks the file into small chunks and distributes among its workers. All the workers parallelly process the data.</p>
	<button>Run Gender Count</button>
</form>

<form method="POST" action="languagerunprogress-spark.php">
	<h3>Gender Language Count</h3>
	<p>In the following sample count example, we shall count the number of Females and Males which prefer Python as their programming language.</p>
	<a href="/data/small.txt" target="_blank">Click here to view the sample file containing records</a><br>
	<p>The file contains 6 records. Each row has a name, gender, age and the programming language they prefer.<br> Spark breaks the file into small chunks and distributes among its workers. All the workers parallelly process the data.</p>
	<button>Run Gender Language Count</button>
</form>
</body>
</html>
