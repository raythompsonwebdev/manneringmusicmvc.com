
<?php

include __DIR__ . '/../includes/DatabaseConnection.php';
if (!isset($_GET['submit'])) {

    //Store search form data submitted into variables
    $artistname = htmlspecialchars($_GET['artist_name']);
    $albumname = htmlspecialchars($_GET['album']);
    $genre = htmlspecialchars($_GET['genre']);

    //Inner Join
    $sql = 'SELECT * FROM `album` INNER JOIN `artist` ON `artistId` = `artist`.`id` WHERE `album` LIKE :album AND `genre` LIKE :genre AND `artist_name` LIKE :artist_name';
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':artist_name', '%'.$artistname.'%');
    $stmt->bindValue(':album', '%'.$albumname.'%');
    $stmt->bindValue(':genre', '%'.$genre.'%');
    $stmt->execute();
    $rows = $stmt->fetchAll();    

    if ($rows) {

        foreach ($rows as $row) : ?>
                
        <div class="product-box">

            <figure class="product-info">
                
                <img src="assets/databasepics/<?= $row['image']; ?>" alt="Album-Cover-Image"  />
                
                <!-- <div class="product-box-cartinfo">
                    
                </div> -->
                
                <figcaption >
                    
                    <ul class="product-box-info">
                        <li><?= $row['artist_name']; ?></li>
                        <li><?= $row['album']; ?></li>
                        <li>&pound;<?= $row['price']; ?></li>
                    </ul>
                
                </figcaption>
          
            </figure>            

            <form method="get" action="/singleresult" id="to_album_btn">
            <input type="submit" class="to_album_btn" value="See more.." />
            <input type="hidden" name="albumid" value="<?=$row[0] ?? ''?>">
            <input type="hidden" name="artistid" value="<?=$row['artistId'] ?? ''?>">                    
            </form>
            
        </div>
   
        <?php 
        endforeach;
    } else {
        echo '<p>Nothing to see</p>';
    }
}
?>
