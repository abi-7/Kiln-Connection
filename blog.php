<?php

/*******w******** 
    
    Name: Abigail Ferreira
    Date: 2024-04-07
    Description: Community tab/page for CMS site Kiln Connection.
                This page will be a area where artists and users can connect with one another.
****************/

require('connect.php');

// SQL is written as a String.
//chronological order 5 most recent posts
$query = "SELECT * FROM blog ORDER BY date_posted DESC LIMIT 10";

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
    <!-- Remember that alternative syntax is good and html inside php is bad -->

<?php include('nav.php'); ?>

<main>
    <h2>Recently posted blog entries</h2>

    <!--if no entries yet-->
<?php if($statement->rowCount() == 0) : ?>
    <div>
        <p>No blog entries yet!</p>
</div>
<?php exit; endif; ?>

<?php while($row = $statement->fetch()): ?>
        <div class="all-blogs">
        <h3 class="post-title">
            <a href="show.php?id=<?=$row['id']?>"><?=$row['title']?></a>
        </h3>
        <p><a href="edit.php?id=<?=$row['id']?>" class="post-edit">edit</a></p>
        <small class="post-date">
            Posted on <time datetime="<?=$row['date_posted']?>"><?=
            date_format(date_create($row['date_posted']), 'F j, Y G:i') ?><time>
        </small>
        <br>
        <div class="blog content">
        <?php if(strlen($row['content']) > 200) : ?>
            <?=substr($row['content'], 0, 200) ?>...
            <a href="show.php?id=<?=$row['id']?>">Read Full Post</a>
        </div>
        </div>
        <?php else : ?>
            <?=$row['content']?>
        <?php endif; ?>
    <?php endwhile; ?>
</main>

<?php include('footer.php'); ?>

</body>
</html>
