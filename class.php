<?php

/*******w******** 
    
    Name: Abigail Ferreira
    Date: 2024-04-07
    Description: Book a Class tab opf the CMS site Kiln Connection.
                This page will  dispolay the array of classes available in the database.

****************/

require('connect.php');

// SQL is written as a String.
//chronological order 5 most recent posts
$query = "SELECT * FROM class ORDER BY class_name ASC LIMIT 10";

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
</head>
<body>

<?php include('nav.php'); ?>

<main>
    <h1>Available Classes</h1>
        <div class="search-container">
            <input
             type="text"
             class="search-bar"
             placeholder="Search by ..."
            />
            <button type="submit" class="search-button">Search</button>
        </div>

                                        <!--if no entries yet-->
    <?php if($statement->rowCount() == 0) : ?>
        <div>
            <p>No classes have been posted yet,
                check back later!
            </p>
        </div>
    <?php else:?>
        <ul>
        <?php while($row = $statement->fetch()): ?>
            <li>
                <h3>
                <?= $row['item_name'] ?>
                </h3>
                <small>
                <?= $row['item_cost'] ?>
                </small>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
</main>

<?php include('footer.php'); ?>

</body>
</html>
