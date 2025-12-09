<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Services — Street Bull</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles-landing.css">
</head>

<body>
    <header class="site-header">
        <div class="header-pill">
            <div class="logo">
                <span style="font-weight:900; font-size:24px; letter-spacing:-1px;">STREET BULL</span>
            </div>
            <nav>
                <a href="index.php">Home</a>
                <a href="services.php">Service</a>
                <a href="about.php">About</a>
                <a href="players.php">Players</a>
                <a href="dashboard.php">Dashboard</a>
            </nav>
            <div style="display:flex; gap:10px;">
                <?php
                session_start();
                if (isset($_SESSION['user_id'])): ?>
                    <button onclick="logout()" class="btn-login" style="background:none; border:none; cursor:pointer; font-weight:600; color:#666; padding:10px;">Sign Out</button>
                <?php else: ?>
                    <a href="login.php" style="text-decoration:none; color:#666; font-weight:600; padding:10px;">Login</a>
                <?php endif; ?>
                <a href="contact.php" class="btn-contact">Contact Us</a>
            </div>
            <script>
                async function logout() {
                    await fetch('php/auth.php?action=logout', {
                        method: 'POST'
                    });
                    window.location.href = 'login.php';
                }
            </script>
        </div>
    </header>

    <main class="container" style="padding-top:140px; margin-bottom: 60px;">
        <h1 style="color:var(--navy);">Our Services</h1>
        <p style="margin-bottom: 32px;">We offer a range of services to players, clubs, and the community.</p>

        <div style="display:flex;gap:24px;flex-wrap:wrap;">
            <article class="card" style="flex:1 1 300px;">
                <img src="images/game-1.png" alt="community challenges"
                    style="width:100%;height:200px;object-fit:cover;border-radius:8px;" />
                <h3 style="margin-top: 16px;">Community Challenges</h3>
                <p>We organize local tournaments and pickup games where legends are born. This is the grassroots level
                    where we scout raw talent.</p>
            </article>
            <article class="card" style="flex:1 1 300px;">
                <img src="images/game-2.png" alt="build your legend"
                    style="width:100%;height:200px;object-fit:cover;border-radius:8px;" />
                <h3 style="margin-top: 16px;">Player Representation</h3>
                <p>We help players build their profile, track their progress, and connect with professional clubs. We
                    handle contract negotiations and career management.</p>
            </article>
            <article class="card" style="flex:1 1 300px;">
                <img src="images/game-3.png" alt="street tournaments"
                    style="width:100%;height:200px;object-fit:cover;border-radius:8px;" />
                <h3 style="margin-top: 16px;">Weekly Tournaments</h3>
                <p>Compete for prizes and leaderboard spots in our weekly organized leagues. High-intensity matches for
                    serious competitors.</p>
            </article>
        </div>
    </main>

    <footer class="site-footer"
        style="margin-top:40px;padding-top:40px;padding-bottom:40px;background:var(--navy);color:#fff;">
        <div class="container" style="display:flex;gap:24px;flex-wrap:wrap;align-items:flex-start;">
            <div style="flex:1;min-width:240px;">
                <h4 style="color:#fff;margin-top:0">Contact us</h4>
                <p>Email: safulpay@gmail.com</p>
                <p>Phone: +232 78348219</p>
                <p>Address: 1234 Main St, Freetown, Sierra Leone</p>
            </div>
            <div style="flex:1;min-width:240px;">
                <h4 style="color:#fff;margin-top:0">Follow</h4>
                <p>Twitter • LinkedIn • Instagram</p>
            </div>
        </div>
        <div style="text-align:center;margin-top:24px;color:var(--medium-gray);">© 2025 Street Bull — Football Agent
            Sierra Leone</div>
    </footer>
</body>

</html>