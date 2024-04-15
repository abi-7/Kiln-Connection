<?php

/*******w******** 
    
    Name: Abigail Ferreira
    Date: 2024-04-03
    Description: home page for the Kiln Connection CMS site

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
<div class="container">
    <div class="row">
        <div class="column">
            <h2>Explore the Art</h2>
            <p>Discover the timeless artistry of pottery – where earth and creativity intertwine to form vessels of beauty and utility.
                Whether you're drawn to the meditative process, the tactile satisfaction of molding clay, or the joy of seeing your creations take form, pottery offers endless possibilities for exploration and self-expression. Explore the ancient craft that continues to captivate hearts and hands around the globe. Unleash your imagination, 
                delve into the art of pottery, and let your creativity take shape.
            </p>
            <button type="submit" class="search-button" style="align-items: center;"><a href="blog.php">Connect with the community!</a></button>
        </div>
        <div class="column">
            <img src="images/pottery1.jpg" alt="ceramics-jocelyn-morales-unsplash" width="320" height="480" style="max-height: 100%;">
            <figcaption>Photo by <a href="https://unsplash.com/@molnj?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Jocelyn Morales</a> on <a href="https://unsplash.com/photos/brown-ceramic-cup-on-white-ceramic-saucer-85u5oGSBJ1s?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>
            </figcaption>
        </div>
    </div>
    <div class="row">
        <div class="column">
        <img src="images/pottery3.jpg" alt="ceramics-victor-lu-unsplash" width="100%" style="max-width: 480px;">
            <figcaption>Photo by <a href="https://unsplash.com/@cazat69?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Victor Lu</a> on <a href="https://unsplash.com/photos/person-holding-green-leaf-on-gray-round-plate-S9NeuDnV0mg?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>
            </figcaption>
        </div>
        <div class="column">
        <h2>Classes</h2>
            <p>Unleash your creativity and dive into the world of pottery with our exciting classes! Whether you're a beginner or a seasoned pro, our expert instructors will guide you through the fundamentals and advanced techniques of pottery making.</p>
            <button type="submit" class="search-button"><a href="class.php">Register for a class</a></button>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <br>
            <button type="submit" class="search-button"><a href="artists.php">Check out the pros!</a></button>
            <h2> </h2>
            <button type="submit" class="search-button"><a href="items.php">Dive into our marketplace!</a></button>
        </div>
        <div class="column">
        <img src="images/pottery2.jpg" alt="ceramics-taylor-heery-unsplash" width="100%" style="max-width: 480px;">
            <figcaption>Photo by <a href="https://unsplash.com/@taylorheeryphoto?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Taylor Heery</a> on <a href="https://unsplash.com/photos/brown-and-gray-metal-tool-ZSgWcW70cTs?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>
            </figcaption>
    </div>
    </div>
</div>
</main>

<?php include('footer.php'); ?>

</body>
</html>
