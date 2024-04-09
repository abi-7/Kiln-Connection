<?php

/*******w******** 
    
    Name: Abigail Ferreira
    Date: 2024-04-08
    Description: users creating a blog post

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

            <button type="submit" class="button-primary">Submit Post</button>
        </form>
</main>

    <?php include('footer.php'); ?>

</body>
</html>
