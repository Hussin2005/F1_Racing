<?php include('server2.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>F1 Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/sign_up.css">
</head>

<body>
    <nav style="background:black; padding:15px; text-align:center;">
        <a href="home_page.php" style="color:white; margin:0 15px; text-decoration:none;">Home</a>
        <a href="about_us.php" style="color:white; margin:0 15px; text-decoration:none;">About Us</a>
        <a href="contact.php" style="color:white; margin:0 15px; text-decoration:none;">Contact</a>
    </nav>

    <div class="background"></div>

    <div class="login-container">
        <h1>Sign Up</h1>

        <?php if (count($error) > 0): ?>
            <div style="background:rgba(255,0,0,0.3); padding:10px; border-radius:6px; margin-bottom:15px;">
                <?php foreach ($error as $err): ?>
                    <p style="margin:3px 0;">
                        <?php echo $err; ?>
                    </p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="sign_up.php">
            <div class="input-group">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="input-group">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="input-group">
                <input type="password" name="confirm_pass" required>
                <label>Confirm Password</label>
            </div>
            <button type="submit" name="submit">Sign Up</button>
        </form>

        <div class="login-text">
            Already have an account? <a href="login.php">Login</a>
        </div>
    </div>
</body>

</html>