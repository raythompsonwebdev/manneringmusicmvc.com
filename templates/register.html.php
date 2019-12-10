<section id="main_text" class="group" role="main">

<?php
if (!empty($errors)) :
?>
  <div class="errors">

      <p>Your account could not be created, please check the following:</p>
      <ul>
            <?php
            foreach ($errors as $error) :
            ?>
            <li>
            <?= $error ?>
            </li>

            <?php endforeach; ?>

        </ul>

    </div>

<?php endif; ?>

    <h1>Registration</h1>

    <form action="" method="post" id="registerform" class="group">
        <br />
        <label for="name">Your name</label>
        <input name="author[username]" id="name" type="text" value="<?=$author['username'] ?? ''?>">
        <br />
        <label for="email">Your email address</label>
        <input name="author[email]" id="email" type="email" value="<?=$author['email'] ?? ''?>">
        <br />

        <label for="password">Password</label>
        <input name="author[password]" id="password" type="password" value="<?=$author['password'] ?? ''?>">

        <br /><br />

        <input class="submit" name="submit" type="submit" value="Register account" id="register_btn">

    </form>

</section>