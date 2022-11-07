<section id="main-section" class="group">
	<h2>Login</h2>
	<?php if (isset($error)) : ?>
		<div class="errors"><?= $error; ?></div>
	<?php endif; ?>
	<form method="post" action="" id="registerform">

		<label for="email">Your email address</label>
		<input type="text" id="email" name="email" required>
		<br>
		<label for="password">Your password</label>
		<input type="password" id="password" name="password" required>
		<br>
		<input type="submit" name="login" value="Log in" id="register-btn">
	</form>
	<p class="regformlink">Don't have an account? <a href="author/register">Click here to register an account</a></p>
</section>
