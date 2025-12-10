<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add New Agent — Street Bull</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles-landing.css">
</head>

<body>
    <header class="site-header">
        <div class="header-pill">
            <div class="logo">STREET BULL</div>
            <nav>
                <a href="index.php">Home</a>
                <a href="services.php">Service</a>
                <a href="about.php">About</a>
                <a href="players.php">Players</a>
                <a href="dashboard.php" class="active">Dashboard</a>
            </nav>
            <div class="header-actions">
                <?php
                session_start();
                if (isset($_SESSION['user_id'])): ?>
                    <button onclick="logout()" class="btn-login">Sign Out</button>
                <?php else: ?>
                    <a href="login.php" class="btn-login">Login</a>
                <?php endif; ?>
                <a href="contact.php" class="btn-contact">Contact Us</a>
            </div>
        </div>
    </header>

    <main class="container" style="padding-top:140px; margin-bottom: 60px; max-width: 600px;">
        <h1 style="color:var(--navy); text-align: center;">Add New Agent</h1>

        <form id="add-agent-form" style="background: #fff; padding: 32px; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.08);">

            <div style="margin-bottom: 16px;">
                <label style="display:block; margin-bottom: 8px; font-weight: bold;">Email</label>
                <input type="email" name="email" required placeholder="agent@example.com" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display:block; margin-bottom: 8px; font-weight: bold;">Password</label>
                <input type="password" name="password" required placeholder="******" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display:block; margin-bottom: 8px; font-weight: bold;">Full Name (Optional)</label>
                <input type="text" name="full_name" placeholder="Agent Name" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
            </div>

            <button type="submit" class="btn primary" style="width: 100%;">Create Agent Account</button>
            <a href="dashboard.php" style="display:block; text-align:center; margin-top:16px; color:#666; text-decoration:none;">Cancel</a>
        </form>
    </main>

    <script>
        async function logout() {
            await fetch('php/auth.php?action=logout', {
                method: 'POST'
            });
            window.location.href = 'login.php';
        }

        document.getElementById('add-agent-form').addEventListener('submit', async function(e) {
            e.preventDefault();

            // Re-using auth.php registration logic, but strictly for role='agent'
            // We might need to modify auth.php to accept role only from admins, 
            // but for this MVP we'll simply send role='agent' to the existing register endpoint.

            const formData = new FormData(this);
            const data = Object.fromEntries(formData.entries());
            data.role = 'agent'; // Force role

            try {
                const response = await fetch('php/auth.php?action=register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    alert('Agent created successfully!');
                    window.location.href = 'dashboard.php';
                } else {
                    alert('Error: ' + (result.error || 'Creation failed'));
                }
            } catch (err) {
                console.error(err);
                alert('An network error occurred.');
            }
        });
    </script>
</body>

</html>