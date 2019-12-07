
<section id="main_text" class="group" role="main">

<ul class="categories">
  <?php foreach($categories as $category): ;?>

    <li><a href="/list?category=<?=$category->categoriesId?>"><?=$category->name?></a><li>
      
  <?php endforeach; ?>
</ul>

<p><?=$totalReviews?> Review have been submitted.</p>


<?php foreach($reviews as $review): ?>
<blockquote>
  <p>
  <?=htmlspecialchars($review->reviewtext, ENT_QUOTES, 'UTF-8')?>

    (by <a href="mailto:<?=htmlspecialchars($review->getAuthor()->email, ENT_QUOTES,
                    'UTF-8'); ?>">
                <?=htmlspecialchars($review->getAuthor()->username, ENT_QUOTES,
                    'UTF-8'); ?></a> on 
<?php
$date = new DateTime($review->reviewdate);

echo $date->format('jS F Y');
?>)

<?php if ($userId == $review->authorId): ?>
  <a href="/reviews/editreviews?id=<?=$review->reviewsId?>">Edit</a>
  <form action="/reviews/delete" method="post">
    <input type="hidden" name="id" value="<?=$review->reviewsId?>">
    <input type="submit" value="Delete">
  </form>
<?php endif; ?>
  </p>
</blockquote>
<?php endforeach; ?>

</section>