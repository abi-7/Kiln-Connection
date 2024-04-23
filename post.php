<?php

/*******w******** 
    
    Name: Abigail Ferreira
    Date: 2024-04-08
    Description: users creating a blog post

****************/

require('connect.php');

// update database
// insert statement
if($_POST && !empty($_POST['title']) && !empty($_POST['content'])) {

    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $query = "INSERT INTO blog (title, content) VALUES (:title, :content)";
    $statement = $db->prepare($query);

    $statement->bindValue(':title', $title); 
    $statement->bindValue(':content', $content);

    // execute INSERT command
    $statement->execute();

    //header - takes u to other screen
    header("Location: blog.php");
    
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
        <form action="post.php" method="POST">
            <h2>New Post</h2>
            <div class="form-group-title">
                <label for="title"> Title</label>
                <input type="text" name="title" id="title" minlength="1" required>
            </div>

            <div class="form-group-content">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="10" minlength="1" required></textarea>
            </div>

            <button type="submit" class="search-button">Submit Post</button>
        </form>
</main>

    <?php include('footer.php'); ?>

</body>
</html>
