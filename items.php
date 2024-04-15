<?php

/*******w******** 
    
    Name: Abigail Ferreira
    Date: 2024-04-06
    Description: marketplace tab/page for the site, where users can purchase pottery items

****************/

require('connect.php');

// SQL is written as a String.
//chronological order 5 most recent posts
$query = "
    SELECT Item.*, PotteryType.type_name AS pottery_type
    FROM Item
    INNER JOIN PotteryType ON Item.type_id = PotteryType.type_id
    ORDER BY Item.item_name ASC
    LIMIT 20
";

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
    <h1>Marketplace</h1>
        <div class="search-container">
            <input
             type="text"
             class="search-bar"
             placeholder="Search for pottery items..."
            />
            <button type="submit" class="search-button">Search</button>
        </div>

                                <!--if no entries yet-->
    <?php if($statement->rowCount() == 0) : ?>
        <div>
            <p>No items yet!</p>
        </div>
    <?php else:?>
        <ul class="grid-container">
        <?php while($row = $statement->fetch()): ?>
            <li class="grid-item">
                <h3>
                <?= $row['item_name'] ?>
                </h3>
                <small>Technique:
                <?= $row['pottery_type'] ?>
                </small>
                <small>$
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
