

<section id="main_text" class="group" role="main">

<h2>Categories</h2>

<a id="add-cat-link" href="/editcategories">Add a new category</a>


<?php foreach ($categories as $category) : ?>
<blockquote>
  <p>
    <?=htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8')?>

  <a href="/editcategories?id=<?=$category->id?>">Edit</a>
  <form id="cat-form" action="/deletecategories" method="post">
    <input type="hidden" name="id" value="<?=$category->id?>">
    <input type="submit" value="Delete">
  </form>
  </p>
</blockquote>

<?php endforeach; ?>
</section>