
<section id="main_text" class="group" role="main">

<?php if (empty($reviews->reviewsId) || $user->id == $reviews->authorId || $user->hasPermission(\Ijdb\Entity\Author::EDIT_JOKES)) : ?>
<form id="review-edit" action="" method="post">
    <input type="hidden" name="review[reviewsId]" value="<?=$reviews->reviewsId ?? ''?>">
    <label for="reviewtext">Type your review here:</label>
    <textarea id="reviewtext" name="review[reviewtext]" rows="5" cols="40"><?=$review->reviewtext ?? ''?></textarea>

    <p>Select categories for this joke:</p>
    <?php foreach ($categories as $category) : ?>
    <?php if ($reviews && $review->hasCategory($category->categoriesId)) : ?>
    <input type="checkbox" checked name="category[]" value="<?=$category->categoriesId?>" /> 
    <?php else : ?>
    <input type="checkbox" name="category[]" value="<?=$category->categoriesId?>" /> 
    <?php endif; ?>

    <label><?=$category->name?></label>
    <?php endforeach; ?>

    <input type="submit" name="submit" value="Save">
</form>
<?php else : ?>
<p>You may only edit reviews that you posted.</p>

<?php endif; ?>

</section>