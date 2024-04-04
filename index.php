<?php

/*******w******** 
    
    Name: Abigail Ferreira
    Date: 2024-04-03
    Description: index page of the blog, home page for the blog entries

****************/

require('connect.php');

// SQL is written as a String.
//chronological order 5 most recent posts
$query = "SELECT * FROM blog ORDER BY date_posted DESC LIMIT 5";

// A PDO::Statement is prepared from the query.
$statement = $db->prepare($query);

// Execution on the DB server is delayed until we execute().
$statement->execute(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Welcome to my Blog!</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <header class = "header">
        <div class = "text-center">
            <h1> My Blog </h1>
        </div>
    </header>

<?php include('nav.php'); ?>

<main class="container">


</main>

</body>
</html>