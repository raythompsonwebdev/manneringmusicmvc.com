<section id="main_section" class="group">
	<h1>Register an Account</h1>
	<?php if (!empty($errors)) : ?>
		<div class="errors">
			<p>Your account could not be created, please check the following:</p>
			<ul>
				<?php foreach ($errors as $error) : ?>
					<li><?= $error ?></li>
				<?php endforeach;   ?>
			</ul>
		</div>
	<?php endif; ?>
	<form id="registerform" action="" method="post">
		<label for="email">Your email address</label>
		<input name="author[email]" id="email" type="text" value="<?= $author['email'] ?? '' ?>" required>

		<label for="name">Your name</label>
		<input name="author[name]" id="name" type="text" value="<?= $author['name'] ?? '' ?>" required>

		<label for="password">Password</label>
		<input name="author[password]" id="password" type="password" value="<?= $author['password'] ?? '' ?>">
		<br />
		<input type="submit" id="register_btn" name="submit" value="Register account">
	</form>

</section>
