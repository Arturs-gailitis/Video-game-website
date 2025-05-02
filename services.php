<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Video Games Website</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Main Page</a>
                    </li>
                    <li c   lass="nav-item">
                        <a class="nav-link" href="services.php">List of Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About the Team</a>
                    </li>
                </ul>
            </div>
            <button id="darkModeToggle" class="btn btn-light">Toggle Dark Mode</button>
        </div>
    </nav>

    <section class="services">
        <h2>Services</h2>
        <div class="form-group">
            <select id="serviceDropdown" class="form-control mb-3">
              <option value="">Select a service...</option>
              <option value="game development support">Game Development Support</option>
              <option value="e-sports tournament">E-sports Tournament</option>
              <option value="video game guides">Video Game Guides</option>
            </select>
        </div>
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="card" style="margin-bottom: 20px;">
                    <img src="images/game_news.jpg" class="card-img-top service-img" alt="Game Development">
                    <div class="card-body">
                        <h5 class="card-title">Game Development Support</h5>
                        <h5 class="card-title">Promoting indie video games.</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card" style="margin-bottom: 100px;">
                    <img src="images/e-sports.jpeg" class="card-img-top service-img" alt="E-sports Tournament">
                    <div class="card-body">
                        <h5 class="card-title">E-sports Tournament Organization</h5>
                        <h5 class="card-title">Organize and sponsor e-sport tournaments.</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card" style="margin-bottom: 20px;">
                    <img src="images/merch.jpg" class="card-img-top service-img" alt="Game Guides">
                    <div class="card-body">
                        <h5 class="card-title">Video Game Guides</h5>
                        <h5 class="card-title">Provide players with detailed walkthroughs.</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <p>&copy; <span id="years_before"></span><span id="corrent_year"></span> Our Website. All rights reserved. 
        <a href="https://www.instagram.com/">Instagram</a>, <a href="https://x.com/?mx=2">X</a></p>
    </footer>

    <script src="js/DarkTheme.js"></script>
    <script src="js/script.js"></script>
    <script src="js/toggle.js"></script>
    
</body>
</html>