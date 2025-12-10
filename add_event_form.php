<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Event — Street Bull</title>
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
        <h1 style="color:var(--navy); text-align: center;">Add New Event</h1>

        <form id="add-event-form" style="background: #fff; padding: 32px; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.08);">

            <div style="margin-bottom: 16px;">
                <label style="display:block; margin-bottom: 8px; font-weight: bold;">Event Title</label>
                <input type="text" name="title" required placeholder="e.g. Weekly Training" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display:block; margin-bottom: 8px; font-weight: bold;">Date & Time</label>
                <input type="datetime-local" name="event_date" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display:block; margin-bottom: 8px; font-weight: bold;">Location</label>
                <input type="text" name="location" placeholder="e.g. Main Stadium" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display:block; margin-bottom: 8px; font-weight: bold;">Description</label>
                <textarea name="description" rows="3" placeholder="Additional details..." style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;"></textarea>
            </div>

            <button type="submit" class="btn primary" style="width: 100%;">Create Event</button>
            <a href="schedule.php" style="display:block; text-align:center; margin-top:16px; color:#666; text-decoration:none;">Cancel</a>
        </form>
    </main>

    <script>
        async function logout() {
            await fetch('php/auth.php?action=logout', {
                method: 'POST'
            });
            window.location.href = 'login.php';
        }

        document.getElementById('add-event-form').addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            try {
                const response = await fetch('php/add_event.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    alert('Event created successfully!');
                    window.location.href = 'schedule.php';
                } else {
                    alert('Error: ' + (result.error || 'Creation failed'));
                }
            } catch (err) {
                console.error(err);
                alert('A network error occurred.');
            }
        });
    </script>
</body>

</html>