<?php

/*******w******** 
    
    Name: Abigail Ferreira
    Date: 2024-02-19
    Description: main page to explore artists

****************/

require('connect.php');

// SQL is written as a String.
//chronological order 5 most recent posts
$query = "SELECT * FROM artist ORDER BY first_name ASC LIMIT 10";

// Prepare and execute the default query
$statement = $db->prepare($query);

// Execute the query
$statement->execute(); 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
</head>
<body>

<?php include('nav.php'); ?>

<main>
    <h1>Local Artists</h1>
        <form class="search-container" action="" method="GET">
            <input
             type="text"
             class="search-bar"
             placeholder="Search by artist name ..."
            />
            <button type="submit" class="search-button">Search</button>
        </form>

                        <!--if no entries yet-->
    <?php if($statement->rowCount() == 0) : ?>
        <div>
            <p>No artists yet!</p>
        </div>
    <?php else:?>
        <ul>
        <?php while($row = $statement->fetch()): ?>
            <li>
                <h3>
                <?= $row['first_name'] . ' ' . $row['last_name'] ?>
                </h3>
                <small>
                <?= $row['home_studio'] ?>
                </small>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
</main>

<?php include('footer.php'); ?>

</body>
</html>
