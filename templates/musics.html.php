
<section id="main_text" class="group" role="main">

<p><?=$totalMusic?> jokes have been submitted to the Internet Joke Database.</p>

<?php foreach($musics as $music): ?>
<blockquote>
  <p>
  <?=htmlspecialchars($music['text'], ENT_QUOTES, 'UTF-8')?>

    (by <a href="mailto:<?=htmlspecialchars($music['format'], ENT_QUOTES,
                    'UTF-8'); ?>">
                <?=htmlspecialchars($music['albumname'], ENT_QUOTES,
                    'UTF-8'); ?></a> on 
<?php

?>)
  <a href="/edit?id=<?=$music['albumid']?>">Edit</a>
  <form action="/delete" method="post">
    <input type="hidden" name="id" value="<?=$music['albumid']?>">
    <input type="submit" value="Delete">
  </form>
  </p>
</blockquote>
<?php endforeach; ?>

</section>