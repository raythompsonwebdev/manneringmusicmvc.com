
<section id="main_text" class="group" role="main">


<form id="edit-cat" action="" method="post">
	<input type="hidden" name="categories[id]" value="<?=$category->id ?? ''?>">
	<label for="categoryname">Enter category name:</label>
	<input type="text" id="categoryname" name="category[name]" value="<?=$category->name ?? ''?>" />
	<input type="submit" name="submit" value="Save">
</form>
</section>