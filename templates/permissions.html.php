<section id="main_section" class="group">
	<h1>Edit <?= $author->name ?>'s Permissions</h1>

	<form id="review-edit" action="" method="post">

		<?php foreach ($permissions as $name => $value) : ?>
			<div>
				<input name="permissions[]" type="checkbox" value="<?= $value ?>" <?php if ($author->hasPermission($value)) {
																																						echo 'checked';
																																					} ?> />
				<label><?= ucwords(strtolower(str_replace('_', ' ', $name))) ?>
			</div>
		<?php endforeach; ?>

		<input type="submit" value="Submit" />
	</form>

</section>
