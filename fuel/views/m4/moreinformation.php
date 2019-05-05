<div class="content">
    <?php
    //if "email" variable is filled out, send email
    if (isset($_REQUEST['email']))  {
    
    //Email information
    $admin_email = "ct310@cs.colostate.edu, kmlindgr@rams.colostate.edu, mnenriq@colostate.edu, gsparks@rams.colostate.edu, jhgrins@rams.colostate.edu";
    $email = $_REQUEST['email'];
    $subject = $_REQUEST['subject'];
    $comment = $_REQUEST['comment'];
    
    //send email
    mail($admin_email, "$subject", $comment, "From:" . $email);
    
    //Email response
    echo "Thank you for contacting us!";
    }
    
    //if "email" variable is not filled out, display the form
    else  {
    ?>

    <form method="post">

    Your Email: <input name="email" type="text" />
        <br>
        <br>
    Subject: <input name="subject" type="text" />
        <br>
        <br>
    Tell us why do you want a demo?
    <br>

    <textarea name="comment" rows="15" cols="40"></textarea>
        <br>
    <input type="submit" value="Submit" />
    <br>
    <br>
    </form>
    
    <?php
    }
    ?>
</div>
