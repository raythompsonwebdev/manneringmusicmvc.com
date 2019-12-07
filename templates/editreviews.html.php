<?php if (empty($review->reviewsId) || $userId == $review->authorId): ?>
<form action="" method="post">
	<input type="hidden" name="review[reviewsid]" value="<?=$review->reviewsid ?? ''?>">
    <label for="reviewtext">Type your review here:</label>
    <textarea id="reviewtext" name="review[reviewtext]" rows="3" cols="40"><?=$review->reviewtext ?? ''?></textarea>

    <p>Select categories for this joke:</p>
    <?php foreach ($categories as $category): ?>

    <?php if ($review && $review->hasCategory($category->id)): ?>
    <input type="checkbox" checked name="category[]" value="<?=$category->id?>" /> 
    <?php else: ?>
    <input type="checkbox" name="category[]" value="<?=$category->id?>" /> 
    <?php endif; ?>

    <label><?=$category->name?></label>
    <?php endforeach; ?>

    <input type="submit" name="submit" value="Save">
</form>
<?php else: ?>

<p>You may only edit reviews that you posted.</p>

<?php endif; ?>