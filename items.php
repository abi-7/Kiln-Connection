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

$searchErr = '';
$item_details='';
if(isset($_POST['save']))
{
	if(!empty($_POST['search']))
	{
        $search = htmlspecialchars($_POST['search']);
		$searchQuery = "
            SELECT Item.*, PotteryType.type_name AS pottery_type
            FROM Item
            INNER JOIN PotteryType ON Item.type_id = PotteryType.type_id
            WHERE item_name LIKE :search OR type_name LIKE :search
        ";
        $stmt = $db->prepare($searchQuery);

        $stmt->execute(array(':search' => "%$search%"));
        // Fetch results
        $item_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	else
	{
		$searchErr = "Please enter the information";
	}
   
}

// Check if the clear button is clicked
if (isset($_POST['clear'])) {
    $item_details = '';
}

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
<form action="#" method="post">
    <h1>Marketplace</h1>
        <div class="search-container">
            <input
             type="text"
             class="search-bar"
             name="search"
             placeholder="Search for pottery items..."
            />
            <button type="submit" name="save" class="search-button">Search</button>
            <button type="submit" name="clear" class="search-button">Reset</button>
        </div>
</form>

    <!--search error-->
    <?php if(!empty($searchErr)) : ?>
        <div>
             <p><?php echo $searchErr; ?></p>
        </div>
    <?php endif; ?>

     <!--if no entries yet-->
    <?php if($statement->rowCount() == 0) : ?>
        <div>
            <p>No items yet!</p>
        </div>
    <?php else:?>
    <!--display based off search-->
    <?php if(!empty($item_details)) : ?>
    <h2>Search Results</h2>
    <ul class="grid-container">
        <?php foreach($item_details as $item) : ?>
            <li class="grid-item">
                <h3>
                <?= $item['item_name'] ?>
                </h3>
                <small>Technique:
                <?= $item['pottery_type'] ?>
                </small>
                <small>$
                <?= $item['item_cost'] ?>
                </small>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php else: ?>
        <!--default display-->
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
        <?php endif; ?>
</main>

<?php include('footer.php'); ?>

</body>
</html>
