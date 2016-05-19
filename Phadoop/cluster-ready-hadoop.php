<!DOCTYPE html>
<html>
<head>
<title>Data Sciences</title>
</head>
<body>
<a href="/index.html">
	<img src="house-home.jpg" style="width:50px;height:50px;">
</a>

<h1>Submit an application</h1>

<h3>The hadoop cluster is now up</h3>
<p>You can access the cluster at...</p>
<a href="http://172.24.42.19:50070" target="_blank">Namenode Info</a> <p>Click the link to view the information about the Namenode and HDFS of our Hadoop Cluster. Namenode holds metadata of the data stored in the HDFS. The actual data resides on Datanodes and the information about what data lies where is in Namenode.</p> <br>
<a href="http://172.24.42.19:8088" target="_blank">Resource Manager</a> <p>Click the link to view the information about all the applications running on our hadoop cluster. </p>

<form method="POST" action="genderrunprogress-hadoop.php">
	<h3>Gender Count</h3>
	<p>In the following sample count example, we shall count the number of Females and Males as listed in the sample file.</p>
	<a href="/var/www/jproject.ca/docs/data/small.txt" target="_blank">Click here to view the sample file containing records</a><br>
	<p>The file contains 6 records(working with a small file). Each row has a name, gender, age and the programming language they prefer.<br> Hadoop breaks the file into small chunks and distributes among its workers. All the workers parallelly process the data.</p>
	<button>Run Gender Count</button>
</form>

<form method="POST" action="languagerunprogress-hadoop.php">
	<h3>Gender Language Count</h3>
	<p>In the following example, we shall count the number of Females and Males which have Python as their preferred language.</p>
	<a href="/var/www/jproject.ca/docs/data/small.txt" target="_blank">Click here to view the sample file containing records</a><br>
	<p>The file contains 6 records. Each row has a name, gender, age and the programming language they prefer.<br> Hadoop breaks the file into small chunks and distributes among its workers. All the workers parallelly process the data.</p>
	<button>Run Gender Language Count</button>
</form>
</body>
</html>
