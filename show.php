<?php

/*******w******** 
    
    Name: Abigail Ferreira
    Date: 2024-04-12
    Description: show page for the form, displays/shows the blog post

****************/

require('connect.php');

if(isset($_GET['id'])){
    // Sanitize $_GET['id'] to ensure it's a number.
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $query = "SELECT * FROM blog WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT); 
    $statement->execute();

    $blog = $statement->fetch();

}else{
    $id = false;
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
    <?php if($id):?>
        <h1 class="post-title"><?=$blog['title']?></h1>
        <small class="post-date">
            Posted on <time datetime="<?=$blog['date_posted']?>"><?=
            date_format(date_create($blog['date_posted']), 'F j, Y G:i') ?><time>
        </small>
        <p class="post-content">
            <?=$blog['content']?>
        </p>
    <?php else: ?>
        <p> No blog selected. <a href="<?=$blog['id']?>"> Try this link</a>.</p>
    <?php endif; ?>
    </main>

    <?php include('footer.php'); ?>

</body>
</html>