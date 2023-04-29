<section id="main-section" class="group">
	<h2>Login</h2>
	<?php if (isset($error)) : ?>
		<div class="errors"><?= $error; ?></div>
	<?php endif; ?>
	<form method="post" action="" id="register-form">

		<label for="email" class="register-label">Your email address</label>
		<input type="text" id="email" name="email" required>
		<br>
		<label for="password" class="register-label">Your password</label>
		<input type="password" id="password" name="password" required>
		<br>
		<input type="submit" name="login" value="Log in" id="register-btn">
	</form>
	<p class="not-reg-text">Don't have an account? <a href="author/register" class="not-reg-link">Click here to register an account</a></p>
</section>
