<!DOCTYPE html>
<html>
<style>
html {
  color:white;
}

h1 {
  font-family: verdana;
  color: white;
  text-align: center;
}

h2 {
  font-family: verdana;
  color: black;
  text-align: left;
}

h3 {
  font-family: verdana;
  color: black;
  text-align: left;
}

div {
  border-radius: 5px;
  background-color: #add8e6;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
  font-family: verdana;
  color: black;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4169E1;
  color: white;
}
</style>
<head>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<title>List Of Movies</title>
<body>
<h1>Show Movies Page</h1>
<div class="topnav" id="myTopnav">
	<a href="home.html">Home</a>
	<a href="http://localhost/Project_CalumSmith/showAllMovies.php">Show Movies</a>
  <a href="http://localhost/Project_CalumSmith/search.php">Search</a>
  <a href="http://localhost/Project_CalumSmith/chart.php">Chart</a>
    <i class="fa fa-bars"></i>
  </a>
</div>
<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>ID</th><th>Title</th><th>Studio</th><th>Status</th><th>Sound</th><th>Versions</th><th>RecGetPrice</th><th>Rating</th><th>Year</th><th>Genre</th><th>Aspect</th><th>Frequency</th></tr>";

class TableRows extends RecursiveIteratorIterator
{
    function current()
    {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current();
    }

    function beginChildren()
    {
        echo "<tr>";
    }

    function endChildren()
    {
        echo "</tr>";
    }
}
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "moviesDB";

try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM `movies`");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchall())) as $k => $v)
    {
        echo $v;
    }
}
catch(PDOException $e)
{
    echo 'Error: ' . $e->getMessage();
}

?>
</body>
</html>