<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact Us — Street Bull</title>
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
                    <button onclick="logout()" class="btn-login" style="background:none; border:none; cursor:pointer; font-weight:600; font-size:15px; color:#666;">Sign Out</button>
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
        <h1 style="color:var(--navy);">Contact Us</h1>
        <div style="display:flex; gap: 40px; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 300px;">
                <p>Have questions? Want to join a tournament or get scouted? Reach out to us!</p>

                <div style="margin-top: 32px;">
                    <h3 style="color:var(--navy);">Get in Touch</h3>
                    <p><strong>Email:</strong> safulpay@gmail.com</p>
                    <p><strong>Phone:</strong> +232 78348219</p>
                    <p><strong>Address:</strong> 1234 Main St, Freetown, Sierra Leone</p>
                </div>

                <div style="margin-top: 32px;">
                    <h3 style="color:var(--navy);">Follow Us</h3>
                    <p>Stay updated with the latest news and player spotlights.</p>
                    <div style="display:flex; gap: 16px; font-size: 1.2em;">
                        <a href="#">Instagram</a>
                        <a href="#">Facebook</a>
                        <a href="#">Twitter</a>
                    </div>
                </div>
            </div>

            <div style="flex: 1; min-width: 300px; background: #f8f9fa; padding: 32px; border-radius: 12px;">
                <h3 style="margin-top: 0;">Send a Message</h3>
                <form id="contact-form">
                    <div style="margin-bottom: 16px;">
                        <label style="display:block; margin-bottom: 8px; font-weight: bold;">Name</label>
                        <input type="text" name="name" required
                            style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                    </div>
                    <div style="margin-bottom: 16px;">
                        <label style="display:block; margin-bottom: 8px; font-weight: bold;">Email</label>
                        <input type="email" name="email" required
                            style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                    </div>
                    <div style="margin-bottom: 16px;">
                        <label style="display:block; margin-bottom: 8px; font-weight: bold;">Message</label>
                        <textarea name="message" rows="5" required
                            style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;"></textarea>
                    </div>
                    <button type="submit" class="btn primary" style="width: 100%;">Send Message</button>
                </form>
            </div>
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

    <script>
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Message sent! We will get back to you soon.');
            this.reset();
        });
    </script>
</body>

</html>