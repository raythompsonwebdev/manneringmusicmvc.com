
<section id="main_text" class="group" role="main">

<p><?=$totalReviews?> jokes have been submitted to the Internet Joke Database.</p>

<?php foreach($reviews as $review): ?>
<blockquote>
  <p>
  <?=htmlspecialchars($review['text'], ENT_QUOTES, 'UTF-8')?>

    (by <a href="mailto:<?=htmlspecialchars($review['format'], ENT_QUOTES,
                    'UTF-8'); ?>">
                <?=htmlspecialchars($review['albumname'], ENT_QUOTES,
                    'UTF-8'); ?></a> on 
<?php
$date = new DateTime($review['reviewdate']);

echo $date->format('jS F Y');
?>)
  <?php if ($userId == $review['authorId']): ?>
<a href="/review/edit?id=<?=$review['id']?>">
Edit</a>
<form action="/review/delete" method="post">
<input type="hidden" name="id"
value="<?=$review['id']?>">
<input type="submit" value="Delete">
</form>
<?php endif; ?>
  </p>
</blockquote>
<?php endforeach; ?>

</section>