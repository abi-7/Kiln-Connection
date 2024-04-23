<?php

/*******w******** 
    
    Name: Abigail Ferreira
    Date: 2024-04-19
    Description: main page to explore artists

****************/

require('connect.php');

// SQL is written as a String.
//chronological order 5 most recent posts
$query = "SELECT * FROM artist ORDER BY first_name ASC LIMIT 20";

// Prepare and execute the default query
$statement = $db->prepare($query);

// Execute the query
$statement->execute(); 

$searchErr = '';
$artist_details='';
if(isset($_POST['save']))
{
	if(!empty($_POST['search']))
	{
        $search = htmlspecialchars($_POST['search']);
		$searchQuery = "
            SELECT * FROM artist WHERE first_name LIKE :search OR last_name LIKE :search
        ";
        $stmt = $db->prepare($searchQuery);

        $stmt->execute(array(':search' => "%$search%"));
        // Fetch results
        $artist_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	else
	{
		$searchErr = "Please enter the information";
	}
   
}

// Check if the clear button is clicked
if (isset($_POST['clear'])) {
    $artist_details = '';
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
    <h1>Local Artists</h1>
        <form action="#" method="post">
            <div class="search-container">
            <input
             type="text"
             class="search-bar"
             name="search"
             placeholder="Search by artist name ..."
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
            <p>No artists yet!</p>
        </div>
    <?php else:?>
    <!--display based off search-->
    <?php if(!empty($artist_details)) : ?>
    <h2>Search Results</h2>
    <ul class="grid-container">
        <?php foreach($artist_details as $artist) : ?>
            <li class="grid-item">
                <h3>
                <?= $artist['first_name'] . ' ' . $artist['last_name'] ?>
                </h3>
                <small>Studio Address: 
                <?= $artist['home_studio'] ?>
                </small>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php else: ?>
        <ul class="grid-container">
        <?php while($row = $statement->fetch()): ?>
            <li class="grid-item">
                <h3>
                <?= $row['first_name'] . ' ' . $row['last_name'] ?>
                </h3>
                <small>Studio Address: 
                <?= $row['home_studio'] ?>
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
