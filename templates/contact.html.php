<?php

$myname = $_REQUEST['myname'];
$mypassword = $_REQUEST['mypassword'];
$mypasswordconf = $_REQUEST['mypasswordconf'];


if ($myname === '') :
	echo "<div>Sorry, your name is a required field</div>";
endif; // input field empty

if (strlen($mypassword) <= 6):
	echo "<div>Sorry, the password must be at least six characters</div>";
endif; //password not long enough


if ($mypassword !== $mypasswordconf) :
	echo "<div>Sorry, passwords must match</div>";
endif; //passwords don't match


if ( !(preg_match('/[A-Za-z]+, [A-Za-z]+/', $myname)) ) :
	echo "<div>Sorry, the name must be in the format: Last, First</div>";
endif; // pattern doesn't match

?>
<!--main text-->
<section id="main_text" class="group" role="main">

<h1>Contact Us</h1>

<br/>

<div id="summary"></div>

<form id="contact-form-a" class="group" method="post" action=""  role="form">

  <br/>
  <label for="name">Full name</label>

  <input type="text" id="name" name="name" title="Please enter your name" required autofocus placeholder="Last, First" value="" >

  <br/>
  <label for="email">E-mail</label>

  <input id="email" name="email" type="email" placeholder="enter email address here" title="Please Enter Your Email Address" required autocomplete="off">
  <br/>
  <label for="message">Message</label>

  <textarea name="message" id="message" cols="30" rows="10" placeholder="Write message here (No HTML Allowed)" ></textarea>
  <br/><br/>

  <input class="submit" name="submit" type="submit" value="Submit" id="contact_btn">
  
</form>

<ul id="contact-details">
  <li>Mannering Music Agency</li>
    <li>1 Somewhere</li>
      <li> London</li>
    <li> E8 2GF</li>
  <li>Tel No: 0208 123 4567</li>
</ul>

<!--Main text end-->

<article id="mapcontainer"></article>

</section>

<?php require __DIR__ . '/../includes/jquery.inc.php'; ?>

<script src="assets/scripts/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        // Registration Form Validation - using jquery.validate.min.js

        $("#contact-form-a").validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                subject: {
                    required: true
                }
            },
            messages: {
                name: "Name is required.",
                email: "Email is required."
            },
            showErrors: function (errorMap, errorList) {
                $("#summary").html("Your form contains " +
                        this.numberOfInvalids() +
                        " errors, see details below.").addClass('error');
                this.defaultShowErrors();
            }

        });


    });
</script>
