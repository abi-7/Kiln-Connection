<?php

/*******w******** 
    
    Name: Abigail Ferreira
    Date: 2024-04-20
    Description: edit page and functionality for editing a blog post, handles updates and deletes

****************/

require('connect.php');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //DELETE POST 
    if (isset($_POST['delete'])) { 
        // Sanitize the post ID
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        if ($id) {
            // Prepare DELETE query
            $query = "DELETE FROM blog WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            if ($statement->execute()) {
                // Redirect after successful deletion
                header("Location: blog.php");
                exit;
            }
        }
        //UPDATE POST
    } elseif (isset($_POST['update'])) {
            // Sanitize user input 
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($id && $title && $content) {
                // Prepare UPDATE query
                $query = "UPDATE blog SET title = :title, content = :content WHERE id = :id";
                $statement = $db->prepare($query);
                $statement->bindParam(':title', $title);
                $statement->bindParam(':content', $content);
                $statement->bindParam(':id', $id, PDO::PARAM_INT);
    
                if ($statement->execute()) {
                    // Redirect after successful update
                    header("Location: blog.php");
                    exit;
                }
            }
        }
    }


// Handling GET request to fetch blog post data
if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if ($id) {
        // Prepare SELECT query
        $query = "SELECT * FROM blog WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        if ($statement->execute()) {
            $blog = $statement->fetch();
        }
    }
} else {
    $blog = null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Edit this Post!</title>
</head>
<body>

    <?php include('nav.php'); ?>

<!--same as index just not in loop, shows post info for the one clicked - what matches the id-->
    <main>
    <?php if($id):?>
        <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?= $blog['id'] ?>">
        <div class="post-title">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" minlength="1" required value="<?= $blog['title'] ?>">
        </div>

        <div class="blog-content">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" minlength="1" required><?= $blog['content'] ?></textarea>
        </div>

        <button type="submit" name="update" class="button-primary">Update Post</button>

        </form>

        <!-- Form for deleting the blog post -->
        <form action="edit.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
            <input type="hidden" name="id" value="<?= $blog['id'] ?>">
            <button type="submit" name="delete" class="button-danger">Delete Post</button>
        </form>

    <?php else: ?>
        <p> No blog selected. <a href="<?=$blog['id']?>"> Try this link</a>.</p>
    <?php endif; ?>
    </main>

    <?php include('footer.php'); ?>
</body>
</html>
