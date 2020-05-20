<section id="main_text" class="group" role="main">

<ul class="categories">
  <?php foreach ($categories as $category) : ?>
    <li><a href="/review/list?category=<?=$category->id?>"><?=$category->name?></a><li>
  <?php endforeach; ?>
</ul>

<div class="reviews">

<p><?=$totalReviews?> reviews have been submitted to the Mannering Review Database.</p>


<?php foreach ($reviews as $review) : ?>

 
<blockquote>
    <?=(new \Mannering\Markdown($review->reviewtext))->toHtml()?>

    (by <a href="mailto:<?=
    htmlspecialchars(
        $review->getAuthor()->email,
        ENT_QUOTES,
        'UTF-8'
                        );
                        ?>">
    <?=htmlspecialchars(
        $review->getAuthor()->name,
        ENT_QUOTES,
        'UTF-8'
    ); ?>
    </a>on
    <?php
      $date = new DateTime($review->reviewdate);
      echo $date->format('jS F Y');
    ?>)

    <?php if ($user) : ?>
        <?php if ($user->id == $review->authorId || $user->hasPermission(\Madb\Entity\Author::EDIT_REVIEWS)) : ?>
  <a href="/review/edit?id=<?=$review->id?>">Edit</a>
        <?php endif; ?>
  
        <?php if ($user->id == $review->authorId || $user->hasPermission(\Madb\Entity\Author::DELETE_REVIEWS)) : ?>
  <form action="/review/delete" method="post">
    <input type="hidden" name="id" value="<?=$review->id?>">
    <input type="submit" value="Delete">
  </form>
        <?php endif; ?>
    <?php endif; ?>
</blockquote>
<?php endforeach; ?>


<span id="review_pagination">


Select page: 

<?php

$numPages = ceil($totalReviews/10);

for ($i = 1; $i <= $numPages; $i++) :
    if ($i == $currentPage) :
        ?>
    <a class="currentpage" href="/review/list?page=<?=$i?><?=!empty($categoryId) ? '&category=' . $categoryId : '' ?>"><?=$i?>
    </a>

    <?php else : ?>
    <a href="/review/list?page=<?=$i?><?=!empty($categoryId) ? '&category=' . $categoryId : '' ?>"><?=$i?>
    </a>

    <?php endif; ?>

<?php endfor; ?>

</span>
</section>