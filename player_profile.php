<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Player Profile — Street Bull</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles-landing.css">
    <!-- Chart.js for Radar Chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .profile-container {
            max-width: 1000px;
            margin: 140px auto 60px;
            padding: 0 20px;
        }

        /* Top Card */
        .profile-header-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin-bottom: 24px;
        }

        .profile-user-info {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--light-gray);
        }

        .profile-actions {
            background: #e0f2fe;
            color: var(--electric);
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        /* Content Grid */
        .profile-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .info-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .grid-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 24px;
        }

        .stat-box h4 {
            color: #999;
            margin: 0 0 8px 0;
            font-size: 0.9em;
            font-weight: 600;
        }

        .stat-box p {
            font-size: 1.1em;
            font-weight: bold;
            color: var(--navy);
            margin: 0;
        }

        .market-value-box {
            background: #f0f9ff;
            padding: 16px;
            border-radius: 12px;
            margin-top: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .mv-label {
            font-weight: bold;
            color: var(--navy);
        }

        .mv-value {
            font-weight: 800;
            color: var(--electric);
            font-size: 1.3em;
        }

        @media (max-width: 768px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }

            .profile-header-card {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .profile-user-info {
                flex-direction: column;
            }
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
                <a href="players.php" class="active">Players</a>
                <a href="dashboard.php">Dashboard</a>
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

    <main class="profile-container">
        <!-- Back Link -->
        <a href="dashboard.php" style="text-decoration:none; color:var(--navy); font-weight:600; margin-bottom:16px; display:inline-block;">&larr; Back to Dashboard</a>

        <div id="loading" style="text-align:center; padding: 40px;">Loading profile...</div>

        <div id="profile-content" style="display:none;">
            <!-- Top Section -->
            <div class="profile-header-card">
                <div class="profile-user-info">
                    <img id="p-image" src="" alt="Player" class="profile-avatar">
                    <div>
                        <h1 id="p-name" style="margin:0; font-size:2em; color:var(--navy);"></h1>
                        <p id="p-desc" style="color:#666; margin:4px 0 0 0;">Professional Footballer</p>
                    </div>
                </div>
                <div>
                    <button class="profile-actions" onclick="assignAgent()">
                        <span id="assign-btn-text">Assign Agent</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </button>
                    <p id="current-agent" style="text-align:right; font-size:0.8em; color:#666; margin-top:8px;"></p>
                </div>
            </div>

            <div class="profile-grid">
                <!-- Left: Stats -->
                <div class="info-card">
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:24px;">
                        <div style="width:40px; height:40px; border-radius:50%; background:#eee; display:flex; align-items:center; justify-content:center;">⚽</div>
                        <div>
                            <h3 id="p-club" style="margin:0; color:var(--navy);"></h3>
                            <span style="font-size:0.9em; color:#666;">Current Club</span>
                        </div>
                    </div>

                    <div class="grid-stats">
                        <div class="stat-box">
                            <h4>Nationality</h4>
                            <p id="p-nation">🇸🇱 Sierra Leone</p>
                        </div>
                        <div class="stat-box">
                            <h4>DOB (Age)</h4>
                            <p id="p-age">--</p>
                        </div>
                        <div class="stat-box">
                            <h4>Height</h4>
                            <p id="p-height">-- CM</p>
                        </div>
                        <div class="stat-box">
                            <h4>Weight</h4>
                            <p id="p-weight">-- KG</p>
                        </div>
                        <div class="stat-box">
                            <h4>Preferred Foot</h4>
                            <p id="p-foot">--</p>
                        </div>
                        <div class="stat-box">
                            <h4>Position</h4>
                            <p id="p-pos">--</p>
                        </div>
                    </div>

                    <div class="market-value-box">
                        <span class="mv-label">Market Value :</span>
                        <span class="mv-value" id="p-value">€0</span>
                    </div>
                    <p style="font-size:0.8em; color:#999; margin-top:8px;">Is player value higher or lower?</p>
                </div>

                <!-- Right: Radar Chart -->
                <div class="info-card">
                    <h3 style="margin-top:0; color:var(--navy);">Attribute Overview</h3>
                    <p style="color:#999; font-size:0.9em; margin-bottom:20px;">A property or characteristic of an player.</p>

                    <div style="height:300px; width:100%;">
                        <canvas id="attributeChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        async function logout() {
            await fetch('php/auth.php?action=logout', {
                method: 'POST'
            });
            window.location.href = 'login.php';
        }

        const urlParams = new URLSearchParams(window.location.search);
        const playerId = urlParams.get('id');

        if (!playerId) {
            alert('No player selected');
            window.location.href = 'dashboard.php';
        }

        let currentPlayer = null;

        async function loadProfile() {
            try {
                const res = await fetch(`php/get_player_details.php?id=${playerId}`);
                const data = await res.json();

                if (data.error) {
                    alert(data.error);
                    return;
                }

                currentPlayer = data;
                renderProfile(data);
                renderChart(data);

                document.getElementById('loading').style.display = 'none';
                document.getElementById('profile-content').style.display = 'block';

            } catch (err) {
                console.error(err);
                document.getElementById('loading').innerText = 'Error loading profile.';
            }
        }

        function renderProfile(p) {
            document.getElementById('p-image').src = p.image_url || 'https://via.placeholder.com/150';
            document.getElementById('p-name').textContent = p.full_name;
            document.getElementById('p-club').textContent = p.current_club || 'Free Agent';
            document.getElementById('p-nation').textContent = p.nationality || 'Sierra Leone';
            document.getElementById('p-age').textContent = `${p.age || '--'} Yrs`;
            document.getElementById('p-height').textContent = `${p.height_cm || '--'} CM`;
            document.getElementById('p-weight').textContent = `${p.weight_kg || '--'} KG`;
            document.getElementById('p-foot').textContent = p.preferred_foot || 'Right';
            document.getElementById('p-pos').textContent = p.position;

            const formatter = new Intl.NumberFormat('en-IE', {
                style: 'currency',
                currency: 'EUR',
                maximumFractionDigits: 0
            });
            document.getElementById('p-value').textContent = formatter.format(p.market_value || 0);

            if (p.agent_name) {
                document.getElementById('assign-btn-text').textContent = 'Reassign Agent';
                document.getElementById('current-agent').textContent = `Agent: ${p.agent_name}`;
            } else {
                document.getElementById('current-agent').textContent = 'No Agent Assigned';
            }
        }

        let myRadarChart = null;

        function renderChart(p) {
            const ctx = document.getElementById('attributeChart').getContext('2d');

            const data = {
                labels: ['ATT', 'TEC', 'TAC', 'DEF', 'CRE'],
                datasets: [{
                    label: 'Attributes',
                    data: [
                        p.attribute_att || 70,
                        p.attribute_tec || 70,
                        p.attribute_tac || 70,
                        p.attribute_def || 70,
                        p.attribute_cre || 70
                    ],
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)',
                    pointBackgroundColor: 'rgb(54, 162, 235)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(54, 162, 235)'
                }]
            };

            const config = {
                type: 'radar',
                data: data,
                options: {
                    elements: {
                        line: {
                            borderWidth: 3
                        }
                    },
                    scales: {
                        r: {
                            angleLines: {
                                display: true
                            },
                            suggestedMin: 0,
                            suggestedMax: 100
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                },
            };

            if (myRadarChart) myRadarChart.destroy();
            myRadarChart = new Chart(ctx, config);
        }

        async function assignAgent() {
            // Simple prompt for now to assign an agent ID
            // In a real app we would query available agents and show a dropdown
            const agentId = prompt("Enter Agent ID to assign (See dashboard for IDs):");
            if (agentId) {
                try {
                    const formData = new FormData();
                    formData.append('player_id', playerId);
                    formData.append('agent_id', agentId);

                    const res = await fetch('php/assign_player.php', {
                        method: 'POST',
                        body: formData
                    });
                    const result = await res.json();
                    if (result.success) {
                        alert('Assigned successfully!');
                        loadProfile(); // Reload
                    } else {
                        alert('Failed: ' + result.error);
                    }
                } catch (e) {
                    console.error(e);
                }
            }
        }

        loadProfile();
    </script>
</body>

</html>