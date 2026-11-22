<?php include('server2.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback - F1 Racing</title>
    <link rel="stylesheet" href="css/feedback.css">
</head>
<body>
    <div style="text-align:center; padding:15px;">
        <a href="home_page.php">Home</a>
        <a href="product.php">Products</a>
        <a href="contact.php">Contact</a>
    </div>

    <h1>Feedback</h1>

    <?php if(isset($_POST['send_feedback'])): ?>
        <h3 style="color:green; text-align:center;">Thank you for your feedback!</h3>
    <?php endif; ?>

    <form method="POST" action="feedback.php">
        <h2>Share Your Experience</h2>

        <label>Your Name:</label>
        <input type="text" name="fname" placeholder="Enter your name" required>

        <label>Email:</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <label>Rate your experience:</label>
        <select name="rating">
            <option value="5">Excellent</option>
            <option value="4">Very Good</option>
            <option value="3">Good</option>
            <option value="2">Fair</option>
            <option value="1">Poor</option>
        </select>

        <label>Your Feedback:</label>
        <textarea name="message" rows="6" placeholder="Tell us about your experience..." required></textarea>

        <button type="submit" name="send_feedback">Submit Feedback</button>
    </form>
</body>
</html>