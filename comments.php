<?php
   $index = null;
   if(isset($_GET['index'])) {
    $index=$_GET['index'];


   require 'database.php';
   
    $sqlSelect="SELECT author, text, post_id FROM comments WHERE post_id = ?";
    $statement=$connection->prepare($sqlSelect);
    $statement->execute([$index]);
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $comments = $statement->fetchAll();
   }
?>

<div>
    <ul class="comments">
<?php foreach ($comments as $comment) { ?>
    <hr>
    <li class="comment">
         <span><?php echo $comment['author']; ?></span>
         <hr>
         <span><?php echo $comment['text']; ?></span>
    </li>
 <?php } ?>
</ul>
</div> 