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
$query = "SELECT * FROM class ORDER BY class_name ASC LIMIT 20";

// A PDO::Statement is prepared from the query.
$statement = $db->prepare($query);

// Execution on the DB server is delayed until we execute().
$statement->execute(); 

$searchErr = '';
$class_details='';
if(isset($_POST['save']))
{
	if(!empty($_POST['search']))
	{
        $search = htmlspecialchars($_POST['search']);
		$searchQuery = "
            SELECT * FROM class WHERE class_name LIKE :search OR artist_teacher LIKE :search
        ";
        $stmt = $db->prepare($searchQuery);

        $stmt->execute(array(':search' => "%$search%"));
        // Fetch results
        $class_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	else
	{
		$searchErr = "Please enter the information";
	}
   
}

// Check if the clear button is clicked
if (isset($_POST['clear'])) {
    $class_details = '';
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
    <h1>Available Classes</h1>
        <div class="search-container">
            <input
             type="text"
             class="search-bar"
             name="search"
             placeholder="Search by class or teacher name..."
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
            <p>No classes have been posted yet,
                check back later!
            </p>
        </div>
    <?php else:?>
    <!--display based off search-->
    <?php if(!empty($class_details)) : ?>
    <h2>Search Results</h2>
    <ul class="grid-container">
        <?php foreach($class_details as $class) : ?>
            <li class="grid-item">
                <h3>
                <?= $class['class_name'] ?>
                </h3>
                <small>
                <?= $class['class_level'] ?>
                </small>
                <small>Teacher: 
                <?= $class['artist_teacher'] ?>
                </small>
                <small>$
                <?= $class['class_cost'] ?>
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
                <?= $row['class_name'] ?>
                </h3>
                <small>
                <?= $row['class_level'] ?>
                </small>
                <small>Teacher: 
                <?= $row['artist_teacher'] ?>
                </small>
                <small>$
                <?= $row['class_cost'] ?>
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
