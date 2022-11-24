<section id="main-section">
	<form action="" method="post" id="edit-category">
		<input type="hidden" name="category[id]" value="<?= $category->id ?? '' ?>">
		<label for="categoryname" class="edit-category-label">Enter category name:</label>
		<input type="text" id="categoryname" name="category[name]" value="<?= $category->name ?? '' ?>" />
		<input type="submit" name="submit" id="edit-category-submit" value="Save">
	</form>
</section>
