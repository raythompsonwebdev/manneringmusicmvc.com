
<section id="main_text" class="group" role="main">


<form id="edit-cat" action="" method="post">
	<input type="hidden" name="categories[categoriesId]" value="<?=$category->categoriesId ?? ''?>">
	<label for="categoryname">Enter category name:</label>
	<input type="text" id="categoryname" name="categories[name]" value="<?=$category->name ?? ''?>" />
	<input type="submit" name="submit" value="Save">
</form>
</section>