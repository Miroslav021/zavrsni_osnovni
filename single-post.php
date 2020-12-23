<?php
        $index = null;
        if (isset($_GET['index'])) {
            $index=$_GET['index'];


        require 'database.php';

        $sqlSelect = "SELECT id, title, created_at, body, author FROM posts WHERE id = $index";
        $statement = $connection->prepare($sqlSelect);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $singleBlog = $statement->fetch();
    }
?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
        
        <link href="styles/blog.css" rel="stylesheet">
        <link href="styles/style.css" rel="stylesheet">
</head>


<!-- ------------------------------------------------------------- -->

        <?php include 'header.php'; ?>

        <main role="main" class="container">
        <div class="row">
        <div class="col-sm-8 blog-main">
        <div class="blog-post">
        <h2 class="blog-post-title"><?php echo $singleBlog['title']; ?></h2>
        <p class="blog-post-meta"><?php echo $singleBlog['created_at']; ?> by <a href="#"><?php echo $singleBlog['author']; ?></a></p>

                <p><?php echo $singleBlog['body'] ?></p>

        <?php include 'comments.php'; ?>

    </div>
        <?php include 'sidebar.php'; ?>
    </div>
    </main>
    <?php include 'footer.php'; ?>