<?php include('server2.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>F1 Racing</title>
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <nav>
        <a href="home_page.php">Home</a>
        <a href="about_us.php">About</a>
        <a href="feedback.php">Feedback</a>
        <a href="contact.php">Contact</a>
        <a href="product.php">Products</a>
        <a href="logout.php">Logout</a>
    </nav>

    <div class="welcome">
        <h1>Welcome to F1 Racing Blog</h1>
        <p>We are offering and selling F1 T-shirts, merchandise and racing gear</p>
        <?php if (isset($_SESSION['success'])): ?>
            <p style="color:#00ff88; font-weight:bold;">
                <?php echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </p>
        <?php endif; ?>
    </div>

    <h2 class="title">Our F1 Teams</h2>
    <div style="text-align:center;">
        <div class="box">
            <div class="brand">Scuderia Ferrari</div>
            <div class="name">Ferrari Team</div>
            <div class="info">Italian Team 🇮🇹</div>
        </div>
        <div class="box">
            <div class="brand">Oracle Red Bull</div>
            <div class="name">Red Bull Team</div>
            <div class="info">Austrian Team 🇦🇹</div>
        </div>
        <div class="box">
            <div class="brand">Mercedes-AMG</div>
            <div class="name">Mercedes Team</div>
            <div class="info">German Team 🇩🇪</div>
        </div>
        <div class="box">
            <div class="brand">McLaren F1</div>
            <div class="name">McLaren Team</div>
            <div class="info">British Team 🇬🇧</div>
        </div>
        <div class="box">
            <div class="brand">Aston Martin</div>
            <div class="name">Aston Martin Team</div>
            <div class="info">British Team 🇬🇧</div>
        </div>
    </div>

    <div class="standings">
        <h3>2024 Championship Standings</h3>
        <table class="table" border="1">
            <tr>
                <th>Team Name</th>
                <th>Points 2024</th>
                <th>Country</th>
            </tr>
            <tr>
                <td>McLaren</td>
                <td>640</td>
                <td>UK</td>
            </tr>
            <tr>
                <td>Ferrari</td>
                <td>584</td>
                <td>Italy</td>
            </tr>
            <tr>
                <td>Red Bull</td>
                <td>555</td>
                <td>Austria</td>
            </tr>
            <tr>
                <td>Mercedes</td>
                <td>468</td>
                <td>Germany</td>
            </tr>
            <tr>
                <td>Aston Martin</td>
                <td>94</td>
                <td>UK</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p>&copy; 2025 F1 Racing Blog. All rights reserved.</p>
    </div>
</body>

</html>