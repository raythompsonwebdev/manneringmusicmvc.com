
<section id="main_text" class="group" role="main">

<h1>Reviews</h1>

<ul class="categories">
  <?php foreach ($categories as $category) :
      ;?>

    <li><a href="/list?category=<?=$category->categoriesId?>"><?=$category->name?></a><li>
      
  <?php endforeach; ?>
</ul>

<p><?=$totalReviews?> Review have been submitted.</p>


<?php foreach ($reviews as $review) : ?>

<blockquote>

    <?=(new \Ninja\Markdown($review->reviewtext))->toHtml()?>

    (by <a href="mailto:<?=htmlspecialchars(
        $review->getAuthor()->email,
        ENT_QUOTES,
        'UTF-8'
                        ); ?>">
                <?=htmlspecialchars(
                    $review->getAuthor()->username,
                    ENT_QUOTES,
                    'UTF-8'
                ); ?></a> on 
<?php
$date = new DateTime($review->reviewdate);

echo $date->format('jS F Y');
?>)

<?php if ($user) : ?>
    <?php if ($user->authorId == $review->authorId || $user->hasPermission(\Ijdb\Entity\Author::EDIT_REVIEWS)) : ?>
    <a href="/editreviews?id=<?=$review->authorId?>">Edit</a>
    <?php endif; ?> 
    

    <?php if ($user->authorId == $review->authorId || $user->hasPermission(\Ijdb\Entity\Author::DELETE_REVIEWS)) : ?>
  <form action="/deletereviews" method="post">
    <input type="hidden" name="id" value="<?=$review->authorId?>">
    <input type="submit" value="Delete">
  </form>
    <?php endif; ?>
<?php endif; ?>
</blockquote>
<?php endforeach; ?>

</section>