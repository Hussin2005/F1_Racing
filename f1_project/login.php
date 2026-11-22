<?php include('server2.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>F1 Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <nav style="background:black; padding:15px; text-align:center;">
        <a href="home_page.php" style="color:white; margin:0 15px; text-decoration:none;">Home</a>
        <a href="about_us.php" style="color:white; margin:0 15px; text-decoration:none;">About Us</a>
        <a href="contact.php" style="color:white; margin:0 15px; text-decoration:none;">Contact</a>
    </nav>

    <div class="background"></div>

    <div class="login-container">
        <h1>Login</h1>

        <?php if (count($error) > 0): ?>
            <div style="background:rgba(255,0,0,0.3); padding:10px; border-radius:6px; margin-bottom:15px;">
                <?php foreach ($error as $err): ?>
                    <p style="margin:3px 0;">
                        <?php echo $err; ?>
                    </p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <div class="input-group">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <button type="submit" name="Login">Sign in</button>
        </form>

        <div class="signup-text">
            Not a member yet? <a href="sign_up.php">Sign Up</a>
        </div>
    </div>
</body>

</html>