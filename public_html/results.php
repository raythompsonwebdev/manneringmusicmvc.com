
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

            <figure class="product-box-img">
                
                <img src="assets/databasepics/<?= $rows['image']; ?>" alt="Album-Cover-Image"  />
                
                <div class="product-box-cartinfo">
                    <h4>&pound;<?= $row['price']; ?></h4>
                    <span><?= $row['album']; ?></span>
                </div>
                
                <figcaption >
                    
                    <ul class="product-box-info">
                    <li>
                        
                        <span><?= $row['artist_name']; ?></span>
                    </li>
                                       
                    </ul>
                
                </figcaption>
          
            </figure>

            

            <form method="get" action="/singleresult" id="addcartbtn">
            <input type="submit" class="addcartbtn" value="See more.." />
            <input type="hidden" name="albumid" value="<?=$row['albumid'] ?? ''?>">
            <input type="hidden" name="artistid" value="<?=$row['artistId'] ?? ''?>">
                     
            </form>
            
        </div>
   
        <?php 
        endforeach;
    } else {
        echo 'Nothing to see';
    }
}
?>
