<?php include('server2.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact - F1 Racing</title>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <div class="contact-section">
        <div style="text-align:center; padding:10px;">
            <a href="home_page.php">Home</a>
            <a href="about_us.php">About Us</a>
            <a href="product.php">Products</a>
        </div>

        <h2 class="section-title">Contact Us</h2>

        <?php if(isset($_POST['send_message'])): ?>
            <div style="text-align:center; background:rgba(0,200,0,0.2); padding:15px; border-radius:8px; margin:20px auto; max-width:800px; color:white; font-size:20px;">
                Message sent successfully! We will get back to you soon.
            </div>
        <?php endif; ?>

        <form class="contact-form" method="POST" action="contact.php">
            <div class="row">
                <input type="text" name="fname" placeholder="First Name" required>
                <input type="text" name="lname" placeholder="Last Name" required>
            </div>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="subject" placeholder="Subject" required>
            <textarea name="message" rows="6" placeholder="Your message..." required></textarea>
            <button type="submit" name="send_message">Send Message</button>
        </form>
    </div>
</body>
</html>