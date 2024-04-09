<?php

/*******w******** 
    
    Name: Abigail Ferreira
    Date: 2024-04-07
    Description: Book a Class tab opf the CMS site Kiln Connection.
                This page will  dispolay the array of classes available in the database.

****************/


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
<div>
    <h1>Available Classes</h1>
        <div class="search-container">
            <input
             type="text"
             class="search-bar"
             placeholder="Search by ..."
            />
            <button type="submit" class="search-button">Search</button>
        </div>
</main>

<?php include('footer.php'); ?>

</body>
</html>
