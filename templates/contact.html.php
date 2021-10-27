<!--main text-->

<section id="main_text" class="group">

    <h1>Contact Us</h1>

    <br />

    <div id="summary"></div>

    <form id="contact-form-a" class="group" method="post" action="">

        <br />
        <label for="name">Full name</label>

        <input type="text" id="name" name="name" title="Please enter your name" required autofocus
            placeholder="Last, First" value="">

        <br />
        <label for="email">E-mail</label>

        <input id="email" name="email" type="email" placeholder="enter email address here"
            title="Please Enter Your Email Address" required autocomplete="off">
        <br />
        <label for="message">Message</label>

        <textarea name="message" id="message" cols="30" rows="10"
            placeholder="Write message here (No HTML Allowed)"></textarea>
        <br /><br />

        <input class="submit" name="submit" type="submit" value="Submit" id="contact_btn">

    </form>

    <address id="contact-details">
        <p>Mannering Music Agency</p>
        <p>1 Somewhere</p>
        <p> London</p>
        <p> E8 2GF</p>
        <p>Tel No: 0208 123 4567</p>
    </address>

    <!--Main text end-->

    <div id="mapcontainer"></div>

</section>

<?php require __DIR__ . '/../includes/jquery.inc.php'; ?>