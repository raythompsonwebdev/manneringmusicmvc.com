<section id="main-section" class="group">

	<?php if (empty($review->id) || $user->id == $review->authorId || $user->hasPermission(\Madb\Entity\Author::EDIT_REVIEWS)) : ?>

		<form action="" id="review-edit" method="post">

			<input type="hidden" name="review[id]" value="<?= $review->id ?? '' ?>">
			<label for="reviewtext">Type your review here:</label>
			<textarea id="reviewtext" name="review[reviewtext]" rows="3" cols="40"><?= $review->reviewtext ?? '' ?></textarea>

			<p>Select categories for this review:</p>
			<?php foreach ($categories as $category) : ?>

				<?php if ($review && $review->hasCategory($category->id)) : ?>
					<input type="checkbox" checked name="category[]" value="<?= $category->id ?>" />
				<?php else : ?>
					<input type="checkbox" name="category[]" value="<?= $category->id ?>" />
				<?php endif; ?>

				<label><?= $category->name ?></label>
			<?php endforeach; ?>

			<input type="submit" name="submit" value="Save">

		</form>

	<?php else : ?>

		<p>You may only edit reviews that you posted.</p>

	<?php endif; ?>

</section>
