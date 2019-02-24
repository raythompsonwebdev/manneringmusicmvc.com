
<section id="main_text" class="group" role="main">

<p><?=$totalReviews?> Reviews have been submitted.</p>

<?php foreach($reviews as $review): ?>
<blockquote>
  <p>
  <?=htmlspecialchars($review['reviewtext'], ENT_QUOTES, 'UTF-8')?>

    (by <a href="mailto:<?=htmlspecialchars($review['email'], ENT_QUOTES,
                    'UTF-8'); ?>">
                <?=htmlspecialchars($review['name'], ENT_QUOTES,
                    'UTF-8'); ?></a> on 
<?php
$date = new DateTime($review['reviewdate']);

echo $date->format('jS F Y');
?>)

<?php if ($userId == $review['authorId']): ?>
  <a href="/edit?id=<?=$review['reviewsid']?>">Edit</a>
  <form action="/delete" method="post">
    <input type="hidden" name="id" value="<?=$review['reviewsid']?>">
    <input type="submit" value="Delete">
  </form>
<?php endif; ?>
  </p>
</blockquote>
<?php endforeach; ?>

</section>