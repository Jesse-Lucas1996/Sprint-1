<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button[type=submit] {
  width: 5%;
  background-color: #4169E1;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type=submit]:hover {
  background-color: #00008B;
}

main {
  border-radius: 5px;
  background-color: #add8e6;
  padding: 20px;
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
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4169E1;
  color: white;
}
</style>
<head>
  <title>Search</title>
  <link rel="stylesheet" href="stylesheet.css">
  <h1>Search Page</h1>
</head>

<body>
  <div class="topnav" id="myTopnav">
    <a href="home.html">Home</a>
    <a href="http://localhost/Project_CalumSmith/showAllMovies.php">Show Movies</a>
    <a href="http://localhost/Project_CalumSmith/search.php">Search</a>
    <a href="http://localhost/Project_CalumSmith/chart.php">Chart</a>
    <i class="fa fa-bars"></i>
    </a>
  </div>
        <main class="col-lg-10">
            <form action="search.php" method="post">
                <div class="form-group">
                    <label for="title">Title:</label><br>
                    <input type="text" name="title" placeholder="Type Title here"><br><br>
            
                    <label for="genre">Genre:</label><br>
                    <input type="text" name="genre" placeholder="Type Genre here"><br><br>

                    <label for="rating">Rating:</label><br>
                    <input type="text" name="rating" placeholder="Type Rating here"><br><br>

                    <label for="year">Year:</label><br>
                    <input type="text" name="year" placeholder="Type Year here"><br><br>

                    <button type="submit" name="submit" value="Search">Search</button>
            </form>
    <?php
    $sql = "";
    $sql_update = "";

            if (isset($_POST['submit'])) 
            {
                $error_msg = "";
                $title = $_POST['title'];
                $genre = $_POST['genre'];
                $rating = $_POST['rating'];
                $year = $_POST['year'];

                if (!empty($_POST['title']) && !empty($_POST['genre']) && !empty($_POST['rating']) && !empty($_POST['year']))
                {
                    $sql = "SELECT * FROM `movies` WHERE 
                    title = '$title' AND genre = '$genre' AND rating = '$rating' AND year = '$year'";
                }

                if (!empty($_POST['title']) && !empty($_POST['genre']) && !empty($_POST['rating']) && empty($_POST['year']))
                {
                    $sql = "SELECT * FROM `movies` WHERE 
                    title = '$title' AND genre = '$genre' AND rating = '$rating'";
                }

                if (empty($_POST['title']) && !empty($_POST['genre']) && !empty($_POST['rating']) && !empty($_POST['year']))
                {
                    $sql = "SELECT * FROM `movies` WHERE 
                    genre = '$genre' AND rating = '$rating' AND year = '$year'";
                }

                if (!empty($_POST['title']) && empty($_POST['genre']) && !empty($_POST['rating']) && !empty($_POST['year']))
                {
                    $sql = "SELECT * FROM `movies` WHERE 
                    title = '$title' AND rating = '$rating' AND year = '$year'";
                }

                if (!empty($_POST['title']) && !empty($_POST['genre']) && empty($_POST['rating']) && !empty($_POST['year']))
                {
                    $sql = "SELECT * FROM `movies` WHERE 
                    title = '$title' AND genre = '$genre' AND year = '$year'";
                }


                if (!empty($_POST['title']) && !empty($_POST['genre']) && empty($_POST['rating']) && empty($_POST['year']))
                {
                    $sql = "SELECT * FROM `movies` WHERE 
                    title = '$title' AND genre = '$genre'";
                }

                if (!empty($_POST['title']) && empty($_POST['genre']) && empty($_POST['rating']) && !empty($_POST['year']))
                {
                    $sql = "SELECT * FROM `movies` WHERE 
                    title = '$title' AND year = '$year'";
                }
                
                if (empty($_POST['title']) && !empty($_POST['genre']) && empty($_POST['rating']) && !empty($_POST['year']))
                {
                    $sql = "SELECT * FROM `movies` WHERE 
                    genre = '$genre' AND year = '$year'";
                }

                if (!empty($_POST['title']) && empty($_POST['genre']) && !empty($_POST['rating']) && empty($_POST['year']))
                {
                    $sql = "SELECT * FROM `movies` WHERE 
                    title = '$title' AND rating = '$rating'";
                }

                if (empty($_POST['title']) && !empty($_POST['genre']) && !empty($_POST['rating']) && empty($_POST['year']))
                {
                    $sql = "SELECT * FROM `movies` WHERE 
                    genre = '$genre' AND rating = '$rating'";
                }

                if (empty($_POST['title']) && empty($_POST['genre']) && !empty($_POST['rating']) && !empty($_POST['year']))
                {
                    $sql = "SELECT * FROM `movies` WHERE 
                    rating = '$rating' AND year = '$year'";
                }

                if (!empty($_POST['title']) && empty($_POST['genre']) && empty($_POST['rating']) && empty($_POST['year']))
                {
                    $sql = "SELECT * FROM `movies` WHERE
                    title = '$title'";
                }

                if (empty($_POST['title']) && empty($_POST['genre']) && !empty($_POST['rating']) && empty($_POST['year']))
                {
                    $sql = "SELECT * FROM `movies` WHERE 
                    rating = '$rating'";
                }

                if (empty($_POST['title']) && !empty($_POST['genre']) && empty($_POST['rating']) && empty($_POST['year']))
                {
                    $sql = "SELECT * FROM `movies` WHERE genre = '$genre'";
                }

                if (empty($_POST['title']) && empty($_POST['genre']) && empty($_POST['rating']) && !empty($_POST['year']))
                {
                    $sql = "SELECT *  FROM `movies` WHERE year = '$year'";
                }

                if (empty($_POST['title']) && empty($_POST['genre']) && empty($_POST['rating']) && empty($_POST['year']))
                {
                    $error_msg = "Input something into the textboxes";
                }
                if (!empty($_POST['title']))
                {
                    $sql_update = "UPDATE `movies` SET Frequency = `Frequency` + 1 WHERE Title = '$title'";
                }

                if (!empty($error_msg)) 
                {
                    echo "<p>Error: </p>" . $error_msg;
                } 
                else 
                {       
                $submit = $_POST['submit'];

                if ($submit == "Search") {
                    echo "<table style='border: solid 2px black;'>";
                    echo "<tr><th>ID</th><th>Title</th><th>Studio</th><th>Status</th><th>Sound</th><th>Versions</th><th>RecGetPrice</th><th>Rating</th><th>Year</th><th>Genre</th><th>Aspect</th><th>Frequency</th></tr>";

            class TableRows extends RecursiveIteratorIterator
            {
                function __construct($it)
                {
                    parent::__construct($it, self::LEAVES_ONLY);
                }

                function current()
                {
                    return "<td style='width:300px;border:2px solid black;'>" . parent::current() . "</td>";
                }

                function beginChildren()
                {
                    echo "<tr>";
                }

                function endChildren()
                {
                    echo "</tr>" . "\n";
                }
            }

        $localhost = "localhost";
        $dbname = "moviesdb";
        $username = "root";
        $password = "";

        try 
        {
            $conn = new PDO("mysql:host=$localhost;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
                echo $v;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        echo "</table>";
        if (!empty($_POST['title']))
        {
            try {
                $conn = new PDO("mysql:host=$localhost;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare($sql_update);
                $stmt->execute();
                
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
        }
    }
}
}
?>
</main>
</div> 
</body>
</head>