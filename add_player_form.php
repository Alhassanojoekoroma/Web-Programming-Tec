<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add New Player — Street Bull</title>
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
        <h1 style="color:var(--navy); text-align: center;">Add New Player</h1>

        <form id="add-player-form" style="background: #fff; padding: 32px; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.08);">

            <div style="margin-bottom: 16px;">
                <label style="display:block; margin-bottom: 8px; font-weight: bold;">Full Name</label>
                <input type="text" name="full_name" required placeholder="e.g. Ederson Moraes" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
            </div>

            <div style="display: flex; gap: 16px; margin-bottom: 16px;">
                <div style="flex: 1;">
                    <label style="display:block; margin-bottom: 8px; font-weight: bold;">Profile Picture</label>
                    <input type="file" name="profile_pic" accept="image/*" style="width: 100%;">
                </div>
                <div style="flex: 1;">
                    <label style="display:block; margin-bottom: 8px; font-weight: bold;">Position</label>
                    <select name="position" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                        <option value="Forward">Forward</option>
                        <option value="Midfielder">Midfielder</option>
                        <option value="Defender">Defender</option>
                        <option value="Goalkeeper">Goalkeeper</option>
                    </select>
                </div>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display:block; margin-bottom: 8px; font-weight: bold;">Street Name / Address</label>
                <input type="text" name="street_name" placeholder="e.g. Robert Street" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
            </div>

            <div style="display: flex; gap: 16px; margin-bottom: 16px;">
                <div style="flex: 1;">
                    <label style="display:block; margin-bottom: 8px; font-weight: bold;">Age</label>
                    <input type="number" name="age" placeholder="30" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                </div>
                <div style="flex: 1;">
                    <label style="display:block; margin-bottom: 8px; font-weight: bold;">Shirt No</label>
                    <input type="number" name="shirt_number" placeholder="31" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                </div>
            </div>

            <div style="display: flex; gap: 16px; margin-bottom: 24px;">
                <div style="flex: 1;">
                    <label style="display:block; margin-bottom: 8px; font-weight: bold;">Played</label>
                    <input type="number" name="played" value="0" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                </div>
                <div style="flex: 1;">
                    <label style="display:block; margin-bottom: 8px; font-weight: bold;">Clean Sheets / Assists</label>
                    <input type="number" name="clean_sheets" value="0" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                </div>
                <div style="flex: 1;">
                    <label style="display:block; margin-bottom: 8px; font-weight: bold;">Goals</label>
                    <input type="number" name="goals" value="0" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                </div>
            </div>

            <button type="submit" class="btn primary" style="width: 100%;">Add Player</button>
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

        document.getElementById('add-player-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            try {
                const res = await fetch('php/add_player.php', {
                    method: 'POST',
                    body: formData
                });
                const data = await res.json();

                if (data.success) {
                    alert('Player added successfully!');
                    window.location.href = 'dashboard.php';
                } else {
                    alert('Error: ' + (data.error || 'Unknown error'));
                }
            } catch (err) {
                console.error(err);
                alert('An error occurred.');
            }
        });
    </script>
</body>

</html>