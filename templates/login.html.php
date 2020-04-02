<section id="main_text" class="group" role="main">
<h1>Login</h1>
<?php if (isset($error)):?>
	<div class="errors"><?=$error;?></div>
<?php endif; ?>
<form method="post" action="" id="registerform">

	<label for="email">Your email address</label>
	<input type="text" id="email" name="email">
<br>
	<label for="password">Your password</label>
	<input type="password" id="password" name="password">
	<br>
	<input type="submit" name="login" value="Log in" id="register_btn">
</form>
<p class="regformlink">Don't have an account? <a href="/register">Click here to register an account</a></p>
</section>