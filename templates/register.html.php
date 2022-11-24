<section id="main-section" class="group">
	<h2>Register an Account</h2>
	<?php if (!empty($errors)) : ?>
		<div class="errors">
			<p>Your account could not be created, please check the following:</p>
			<ul>
				<?php foreach ($errors as $error) : ?>
					<li id="formerror"><?= $error ?></li>
				<?php endforeach;   ?>
			</ul>
		</div>
	<?php endif; ?>
	<form id="register-form" action="" method="post">
		<label class="register-label" for="email">Your email address</label>
		<input name="author[email]" id="email" aria-describedby="formerror" type="text" value="<?= $author['email'] ?? '' ?>" required>

		<label class="register-label" for="name">Your name</label>
		<input name="author[name]" id="name" aria-describedby="formerror" type="text" value="<?= $author['name'] ?? '' ?>" required>

		<label class="register-label" for="password">Password</label>
		<input name="author[password]" id="password" aria-describedby="formerror" type="password" value="<?= $author['password'] ?? '' ?>">
		<br />
		<input type="submit" id="register-btn" name="submit" value="Register account">
	</form>

</section>
