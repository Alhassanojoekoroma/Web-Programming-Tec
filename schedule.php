<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manage Schedule — Street Bull</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles-landing.css">
    <style>
        .event-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 16px;
            border-left: 4px solid var(--orange);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .event-date {
            font-weight: bold;
            color: var(--navy);
            font-size: 1.1em;
            text-align: center;
            min-width: 80px;
            margin-right: 20px;
        }

        .event-details h3 {
            margin: 0 0 4px 0;
            color: var(--navy);
        }

        .event-details p {
            margin: 0;
            color: #666;
            font-size: 0.9em;
        }
    </style>
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

    <main class="container" style="padding-top:140px; margin-bottom: 60px;">
        <h1 style="color:var(--navy);">Schedule Management</h1>

        <div style="background:white; padding:24px; border-radius:12px; margin-bottom:24px;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                <h3>Upcoming Events</h3>
                <a href="add_event_form.php" class="btn primary" style="text-decoration:none;">+ Add Event</a>
            </div>

            <div id="events-list">
                <p style="color:#666;">Loading events...</p>
            </div>
        </div>

        <a href="dashboard.php" style="color:var(--navy); text-decoration:none;">&larr; Back to Dashboard</a>
    </main>

    <script>
        async function logout() {
            await fetch('php/auth.php?action=logout', {
                method: 'POST'
            });
            window.location.href = 'login.php';
        }

        async function loadEvents() {
            try {
                // Inline PHP to fetch events for simplicity in MVP, or purely JS if endpoint exists.
                // Since we didn't make a get_events.php, let's make one now or mock it? 
                // Better to create a quick fetch script.
                const response = await fetch('php/get_events.php');
                const events = await response.json();

                const container = document.getElementById('events-list');

                if (events.length === 0) {
                    container.innerHTML = '<p>No upcoming events found.</p>';
                    return;
                }

                let html = '';
                events.forEach(ev => {
                    const dateObj = new Date(ev.event_date);
                    const day = dateObj.toLocaleDateString('en-US', {
                        day: 'numeric',
                        month: 'short'
                    });
                    const time = dateObj.toLocaleTimeString('en-US', {
                        hour: '2-digit',
                        minute: '2-digit'
                    });

                    html += `
                        <div class="event-card">
                            <div style="display:flex; align-items:center;">
                                <div class="event-date">
                                    <div style="font-size:1.2em; font-weight:800; color:var(--orange);">${day.split(' ')[1]}</div> <!-- Day -->
                                    <div style="text-transform:uppercase; font-size:0.8em;">${day.split(' ')[0]}</div> <!-- Month -->
                                </div>
                                <div class="event-details">
                                    <h3>${ev.title}</h3>
                                    <p>${time} • ${ev.location || 'No location'}</p>
                                    <p style="margin-top:4px; font-style:italic;">${ev.description || ''}</p>
                                </div>
                            </div>
                        </div>
                    `;
                });
                container.innerHTML = html;

            } catch (err) {
                // Fallback if get_events.php doesn't exist yet
                // console.error(err); 
                document.getElementById('events-list').innerText = "No events loaded (Backend pending).";

            }
        }
        loadEvents();
    </script>
</body>

</html>