<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Players — Street Bull</title>
  <style>
    :root {
      --navy: #0A1128;
      --electric: #1E3A8A;
      --orange: #FF5722;
      --white: #FFFFFF;
      --light-gray: #F5F5F5;
      --medium-gray: #9CA3AF;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
      color: var(--navy);
      background: var(--light-gray);
    }

    /* Header - Floating Pill Style */
    header.site-header {
      position: fixed;
      top: 20px;
      left: 0;
      width: 100%;
      z-index: 1000;
      display: flex;
      justify-content: center;
      padding: 0 20px;
      background: transparent;
    }

    .header-pill {
      background: #FFFFFF;
      border-radius: 50px;
      padding: 12px 30px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
      max-width: 1100px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .logo {
      font-weight: 900;
      font-size: 22px;
      letter-spacing: -1px;
      color: var(--navy);
    }

    .header-pill nav {
      display: flex;
      gap: 32px;
    }

    .header-pill nav a {
      text-decoration: none;
      color: #666;
      font-weight: 500;
      font-size: 15px;
      transition: color 0.3s;
    }

    .header-pill nav a:hover,
    .header-pill nav a.active {
      color: var(--navy);
    }

    .header-actions {
      display: flex;
      gap: 12px;
      align-items: center;
    }

    .btn-login {
      color: #666;
      font-weight: 600;
      text-decoration: none;
      padding: 8px 16px;
      transition: color 0.3s;
    }

    .btn-login:hover {
      color: var(--navy);
    }

    .btn-contact {
      background: var(--orange);
      color: var(--white);
      padding: 10px 24px;
      border-radius: 25px;
      text-decoration: none;
      font-weight: 600;
      transition: background 0.3s;
    }

    .btn-contact:hover {
      background: #E64A19;
    }

    /* Club Header Section */
    .club-header {
      background: linear-gradient(135deg, var(--navy) 0%, #1a2847 100%);
      padding: 120px 40px 60px;
      margin-top: 90px;
      color: var(--white);
    }

    .club-header-inner {
      max-width: 1200px;
      margin: 0 auto;
    }

    .club-title {
      font-size: 64px;
      font-weight: 800;
      margin-bottom: 40px;
      color: var(--white);
    }

    /* Filters Bar */
    .filters-bar {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      background: rgba(255, 255, 255, 0.1);
      padding: 24px;
      border-radius: 12px;
      backdrop-filter: blur(10px);
    }

    .filter-group {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .filter-group label {
      font-size: 13px;
      font-weight: 600;
      color: rgba(255, 255, 255, 0.8);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .filter-group select {
      background: rgba(255, 255, 255, 0.95);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 8px;
      padding: 12px 14px;
      font-size: 15px;
      font-weight: 500;
      color: var(--navy);
      cursor: pointer;
      transition: all 0.3s;
    }

    .filter-group select:hover {
      background: var(--white);
    }

    .filter-group select:focus {
      outline: none;
      border-color: var(--orange);
      box-shadow: 0 0 0 3px rgba(255, 87, 34, 0.1);
    }

    /* Main Content */
    main {
      max-width: 1200px;
      margin: 0 auto;
      padding: 60px 40px;
    }

    /* Section Title */
    .section-title {
      font-size: 32px;
      font-weight: 800;
      margin-bottom: 32px;
      color: var(--navy);
      position: relative;
      padding-left: 16px;
    }

    .section-title::before {
      content: '';
      position: absolute;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      width: 4px;
      height: 32px;
      background: var(--orange);
      border-radius: 2px;
    }

    /* Player Section */
    .player-section {
      margin-bottom: 80px;
    }

    /* Players Grid */
    .players-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 32px;
    }

    /* Player Card */
    .player-card {
      background: var(--white);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;
      border: 2px solid transparent;
    }

    .player-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
      border-color: var(--orange);
    }

    .card-top {
      background: linear-gradient(135deg, #a8d5f5 0%, #d4ebff 100%);
      height: 280px;
      position: relative;
      display: flex;
      align-items: flex-end;
      justify-content: center;
      padding-bottom: 20px;
    }

    .club-badge {
      position: absolute;
      top: 20px;
      left: 20px;
      width: 48px;
      height: 48px;
      background: var(--white);
      border-radius: 50%;
      padding: 6px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .club-badge img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    .player-img {
      height: 85%;
      width: auto;
      object-fit: contain;
      filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.25));
    }

    .card-bottom {
      padding: 24px;
    }

    .player-name {
      font-size: 22px;
      font-weight: 700;
      margin-bottom: 20px;
      color: var(--navy);
      text-align: center;
    }

    .player-stats {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
      padding-top: 16px;
      border-top: 2px solid var(--light-gray);
    }

    .stat-col {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 4px;
    }

    .stat-label {
      font-size: 11px;
      color: var(--medium-gray);
      text-transform: uppercase;
      font-weight: 600;
      letter-spacing: 0.5px;
    }

    .stat-value {
      font-size: 16px;
      font-weight: 700;
      color: var(--navy);
    }

    .flag-icon {
      font-size: 16px;
      margin-right: 4px;
    }

    /* Footer */
    .site-footer {
      background: var(--navy);
      color: var(--white);
      padding: 60px 40px 40px;
      margin-top: 80px;
    }

    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 40px;
    }

    .footer-section h4 {
      color: var(--white);
      margin-bottom: 16px;
      font-size: 18px;
    }

    .footer-section p {
      color: rgba(255, 255, 255, 0.7);
      line-height: 1.6;
      margin-bottom: 8px;
    }

    .footer-bottom {
      text-align: center;
      margin-top: 40px;
      padding-top: 24px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      color: var(--medium-gray);
      font-size: 14px;
    }

    /* Loading State */
    .loading {
      text-align: center;
      padding: 60px 20px;
      color: var(--medium-gray);
      font-size: 18px;
    }

    /* Empty State */
    .empty-state {
      text-align: center;
      padding: 80px 20px;
      color: var(--medium-gray);
    }

    .empty-state h3 {
      font-size: 24px;
      margin-bottom: 12px;
      color: var(--navy);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
      .players-grid {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 24px;
      }

      .club-title {
        font-size: 48px;
      }
    }

    @media (max-width: 768px) {
      .header-pill nav {
        display: none;
      }

      .club-header {
        padding: 100px 20px 40px;
      }

      .club-title {
        font-size: 36px;
      }

      .filters-bar {
        grid-template-columns: 1fr;
        gap: 16px;
      }

      main {
        padding: 40px 20px;
      }

      .section-title {
        font-size: 24px;
      }

      .players-grid {
        grid-template-columns: 1fr;
        gap: 20px;
      }

      .player-section {
        margin-bottom: 60px;
      }

      .footer-content {
        grid-template-columns: 1fr;
        gap: 32px;
      }
    }

    @media (max-width: 480px) {
      .header-pill {
        padding: 10px 20px;
      }

      .logo {
        font-size: 18px;
      }

      .btn-contact {
        padding: 8px 16px;
        font-size: 14px;
      }

      .club-title {
        font-size: 28px;
      }

      .card-top {
        height: 240px;
      }

      .player-stats {
        grid-template-columns: repeat(2, 1fr);
      }
    }
  </style>
</head>

<body>
  <!-- Header -->
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
      <?php
      if (isset($_SESSION['user_id'])): ?>
        <button onclick="logout()" class="btn-login" style="background:none; border:none; cursor:pointer;">Sign Out</button>
      <?php else: ?>
        <a href="login.php" class="btn-login">Login</a>
      <?php endif; ?>
      <a href="contact.php" class="btn-contact">Contact Us</a>
    </div>
    </div>
  </header>

  <!-- Club Header -->
  <div class="club-header">
    <div class="club-header-inner">
      <h1 class="club-title">Club Players</h1>

      <!-- Filters Bar -->
      <div class="filters-bar">
        <div class="filter-group">
          <label>Season</label>
          <select id="season-filter">
            <option>2024/25</option>
            <option>2023/24</option>
            <option>2022/23</option>
          </select>
        </div>
        <div class="filter-group">
          <label>Country</label>
          <select id="country-filter">
            <option>Robert Street</option>
            <option>Jones Street</option>
            <option>Smith Street</option>
            <option>Waterlo street</option>
          </select>
        </div>
        <div class="filter-group">
          <label>League</label>
          <select id="league-filter">
            <option>League One</option>
            <option>Boxer League</option>
            <option>Sierra Leone Premier League</option>
            <option>Taffue League</option>
          </select>
        </div>
        <div class="filter-group">
          <label>Club</label>
          <select id="club-filter">
            <option>Street Bull FC</option>
            <option>Lion FC</option>
            <option>Abu FC</option>
          </select>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <main>
    <div id="players-container">
      <p class="loading">Loading players...</p>
    </div>
  </main>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="footer-content">
      <div class="footer-section">
        <h4>Contact Us</h4>
        <p>Email: streetbull@gmail.com</p>
        <p>Phone: +232 78348219</p>
        <p>Address: 1234 Main St, Freetown, Sierra Leone</p>
      </div>
      <div class="footer-section">
        <h4>Follow Us</h4>
        <p>Twitter • LinkedIn • Instagram</p>
      </div>
      <div class="footer-section">
        <h4>Quick Links</h4>
        <p>About • Services • Players • Contact</p>
      </div>
    </div>
    <div class="footer-bottom">
      © 2025 Street Bull — Football Agent Sierra Leone
    </div>
  </footer>

  <script>
    async function logout() {
      await fetch('php/auth.php?action=logout', {
        method: 'POST'
      });
      window.location.href = 'login.php';
    }

    function renderPlayers(players) {
      const container = document.getElementById('players-container');
      container.innerHTML = '';

      if (!players || players.length === 0) {
        container.innerHTML = `
          <div class="empty-state">
            <h3>No Players Found</h3>
            <p>Try adjusting your filters or add a new player.</p>
          </div>
        `;
        return;
      }

      const positions = ['Goalkeeper', 'Defender', 'Midfielder', 'Forward'];
      const pluralPositions = {
        'Goalkeeper': 'Goalkeepers',
        'Defender': 'Defenders',
        'Midfielder': 'Midfielders',
        'Forward': 'Forwards'
      };

      positions.forEach(pos => {
        const group = players.filter(p => p.position === pos);
        if (group.length > 0) {
          const section = document.createElement('section');
          section.className = 'player-section';

          const title = document.createElement('h2');
          title.className = 'section-title';
          title.textContent = pluralPositions[pos];
          section.appendChild(title);

          const grid = document.createElement('div');
          grid.className = 'players-grid';

          group.forEach(p => {
            const card = document.createElement('div');
            card.className = 'player-card';

            const assistLabel = pos === 'Goalkeeper' ? 'Clean Sheets' : 'Assists';
            // Use assistLabel if you want dynamic label, but database implementation 
            // has 'clean_sheets' column for everyone as requested for "Clean Sheets" generic input

            // Default image if missing
            const imgUrl = p.image_url || 'https://via.placeholder.com/300x400?text=No+Image';

            card.innerHTML = `
              <div class="card-top" onclick="window.location.href='player_profile.php?id=${p.id}'" style="cursor:pointer;">
                <?php if (!empty($p['current_club'])): ?>
                <div class="club-badge">
                   <!-- Placeholder badge logic -->
                  <span style="font-weight:bold; font-size:10px;">CLUB</span>
                </div>
                <?php endif; ?>
                <img src="${imgUrl}" alt="${p.full_name}" class="player-img">
              </div>
              <div class="card-bottom">
                <h3 class="player-name"><a href="player_profile.php?id=${p.id}" style="text-decoration:none; color:inherit;">${p.full_name}</a></h3>
                <div style="text-align:center; margin-bottom:12px; font-weight:500; color:#666;">
                    ${p.street_name || ''}
                </div>
                <div class="player-stats">
                  <div class="stat-col">
                    <span class="stat-label">Country</span>
                    <span class="stat-value"><span class="flag-icon">🇸🇱</span>${p.nationality || 'SLE'}</span>
                  </div>
                  <div class="stat-col">
                    <span class="stat-label">Age</span>
                    <span class="stat-value">${p.age || '-'}</span>
                  </div>
                  <div class="stat-col">
                    <span class="stat-label">Shirt No</span>
                    <span class="stat-value">${p.shirt_number || '-'}</span>
                  </div>
                  <div class="stat-col">
                    <span class="stat-label">Played</span>
                    <span class="stat-value">${p.played}</span>
                  </div>
                  <div class="stat-col">
                    <span class="stat-label">Clean Sheets</span>
                    <span class="stat-value">${p.clean_sheets}</span>
                  </div>
                  <div class="stat-col">
                    <span class="stat-label">Goals</span>
                    <span class="stat-value">${p.goals}</span>
                  </div>
                </div>
              </div>
            `;
            grid.appendChild(card);
          });

          section.appendChild(grid);
          container.appendChild(section);
        }
      });
    }

    function fetchPlayers() {
      // Collect filters
      const country = document.getElementById('country-filter').value;
      const league = document.getElementById('league-filter').value;
      const club = document.getElementById('club-filter').value;
      const season = document.getElementById('season-filter').value;

      // Build query string
      const params = new URLSearchParams();
      if (country && country !== 'Robert Street') params.append('country', country); // Basic logic for demo
      if (club && club !== 'Street Bull FC') params.append('club', club);

      fetch(`php/get_players.php?${params.toString()}`)
        .then(res => res.json())
        .then(data => {
          if (data.error) {
            console.error(data.error);
          } else {
            renderPlayers(data);
          }
        })
        .catch(err => console.error(err));
    }

    // Initial Load
    fetchPlayers();

    // Filter Listeners
    document.querySelectorAll('select').forEach(select => {
      select.addEventListener('change', fetchPlayers);
    });
  </script>
</body>

</html>