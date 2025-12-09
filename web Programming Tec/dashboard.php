<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard — Street Bull</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/css/styles-dashboard.css">
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
        <a href="players.php">Players</a>
        <a href="dashboard.php" class="active">Dashboard</a>
      </nav>
      <div class="header-actions">
        <button onclick="logout()" class="btn-login" style="background:none; border:none; cursor:pointer;">Sign Out</button>
        <a href="contact.php" class="btn-contact">Contact Us</a>
      </div>
    </div>
  </header>
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

  <main class="dashboard-main">
    <!-- Dashboard Header -->
    <div class="dashboard-header">
      <div class="dashboard-header-content">
        <div class="header-left">
          <h1 class="dashboard-title">Dashboard</h1>
          <p class="dashboard-subtitle">Welcome back, Admin</p>
        </div>
        <div class="header-right">
          <button class="btn-secondary">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
              <path d="M17.5 11.6667V8.33333C17.5 5 15.8333 3.33333 12.5 3.33333H7.5C4.16667 3.33333 2.5 5 2.5 8.33333V11.6667C2.5 15 4.16667 16.6667 7.5 16.6667H12.5C15.8333 16.6667 17.5 15 17.5 11.6667Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M12.5 7.5L10 9.16667L7.5 7.5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            Export Report
          </button>
          <a href="php/export_players.php" class="btn-secondary" style="text-decoration:none; display:inline-flex; align-items:center; gap:8px;">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
              <path d="M17.5 11.6667V8.33333C17.5 5 15.8333 3.33333 12.5 3.33333H7.5C4.16667 3.33333 2.5 5 2.5 8.33333V11.6667C2.5 15 4.16667 16.6667 7.5 16.6667H12.5C15.8333 16.6667 17.5 15 17.5 11.6667Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M12.5 7.5L10 9.16667L7.5 7.5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            Export Report
          </a>
          <a href="add_player_form.php" class="btn-primary" style="text-decoration:none; display:inline-flex; align-items:center; gap:8px;">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
              <path d="M10 4.16667V15.8333" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M4.16667 10H15.8333" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            Add New Player
          </a>
        </div>
      </div>
    </div>

    <div class="dashboard-container">
      <!-- Stats Cards -->
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-icon blue">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M20.5899 22C20.5899 18.13 16.7399 15 11.9999 15C7.25991 15 3.40991 18.13 3.40991 22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <div class="stat-content">
            <p class="stat-label">Total Players</p>
            <h3 class="stat-value">124</h3>
            <p class="stat-change positive">+12% from last month</p>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon orange">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M18 7.16C17.94 7.15 17.87 7.15 17.81 7.16C16.43 7.11 15.33 5.98 15.33 4.58C15.33 3.15 16.48 2 17.91 2C19.34 2 20.49 3.16 20.49 4.58C20.48 5.98 19.38 7.11 18 7.16Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M16.9699 14.44C18.3399 14.67 19.8499 14.43 20.9099 13.72C22.3199 12.78 22.3199 11.24 20.9099 10.3C19.8399 9.59004 18.3099 9.35003 16.9399 9.59003" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M5.96998 7.16C6.02998 7.15 6.09998 7.15 6.15998 7.16C7.53998 7.11 8.63998 5.98 8.63998 4.58C8.63998 3.15 7.48998 2 6.05998 2C4.62998 2 3.47998 3.16 3.47998 4.58C3.48998 5.98 4.58998 7.11 5.96998 7.16Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M6.99994 14.44C5.62994 14.67 4.11994 14.43 3.05994 13.72C1.64994 12.78 1.64994 11.24 3.05994 10.3C4.12994 9.59004 5.65994 9.35003 7.02994 9.59003" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M12 14.63C11.94 14.62 11.87 14.62 11.81 14.63C10.43 14.58 9.32996 13.45 9.32996 12.05C9.32996 10.62 10.48 9.47003 11.91 9.47003C13.34 9.47003 14.49 10.63 14.49 12.05C14.48 13.45 13.38 14.59 12 14.63Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M9.08997 17.78C7.67997 18.72 7.67997 20.26 9.08997 21.2C10.69 22.27 13.31 22.27 14.91 21.2C16.32 20.26 16.32 18.72 14.91 17.78C13.32 16.72 10.69 16.72 9.08997 17.78Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <div class="stat-content">
            <p class="stat-label">Total Agents</p>
            <h3 class="stat-value">12</h3>
            <p class="stat-change positive">+2 new this month</p>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon green">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M8 2V5" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M16 2V5" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M3.5 9.09H20.5" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M11.9955 13.7H12.0045" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M8.29431 13.7H8.30329" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M8.29431 16.7H8.30329" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <div class="stat-content">
            <p class="stat-label">Active Assignments</p>
            <h3 class="stat-value">45</h3>
            <p class="stat-change positive">8 completed today</p>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon purple">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20Z" fill="currentColor" />
              <path d="M16.2 7.8L10.5 13.5L7.8 10.8L6.5 12.1L10.5 16.1L17.5 9.1L16.2 7.8Z" fill="currentColor" />
            </svg>
          </div>
          <div class="stat-content">
            <p class="stat-label">Pending Approvals</p>
            <h3 class="stat-value">5</h3>
            <p class="stat-change neutral">3 require action</p>
          </div>
        </div>
      </div>

      <!-- Main Content Grid -->
      <div class="dashboard-grid">
        <!-- Recent Players -->
        <div class="dashboard-card">
          <div class="card-header">
            <h2 class="card-title">Recent Players</h2>
            <a href="players.html" class="card-link">View All →</a>
          </div>
          <div class="table-container">
            <table class="data-table">
              <thead>
                <tr>
                  <th>Player</th>
                  <th>Position</th>
                  <th>Agent</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="player-cell">
                      <div class="player-avatar">JD</div>
                      <span>John Doe</span>
                    </div>
                  </td>
                  <td>Forward</td>
                  <td>Mike Johnson</td>
                  <td><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                  <td>
                    <div class="player-cell">
                      <div class="player-avatar">AS</div>
                      <span>Abdul Sesay</span>
                    </div>
                  </td>
                  <td>Midfielder</td>
                  <td>Sarah Williams</td>
                  <td><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                  <td>
                    <div class="player-cell">
                      <div class="player-avatar">MK</div>
                      <span>Mohamed Kamara</span>
                    </div>
                  </td>
                  <td>Defender</td>
                  <td>Unassigned</td>
                  <td><span class="status-badge pending">Pending</span></td>
                </tr>
                <tr>
                  <td>
                    <div class="player-cell">
                      <div class="player-avatar">IB</div>
                      <span>Ibrahim Bangura</span>
                    </div>
                  </td>
                  <td>Goalkeeper</td>
                  <td>David Chen</td>
                  <td><span class="status-badge active">Active</span></td>
                </tr>
                <tr>
                  <td>
                    <div class="player-cell">
                      <div class="player-avatar">FK</div>
                      <span>Foday Koroma</span>
                    </div>
                  </td>
                  <td>Forward</td>
                  <td>Unassigned</td>
                  <td><span class="status-badge pending">Pending</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Recent Activity -->
        <div class="dashboard-card">
          <div class="card-header">
            <h2 class="card-title">Recent Activity</h2>
            <button class="card-action">•••</button>
          </div>
          <div class="activity-list">
            <div class="activity-item">
              <div class="activity-icon blue">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                  <path d="M8 8C9.84095 8 11.3333 6.50762 11.3333 4.66667C11.3333 2.82572 9.84095 1.33334 8 1.33334C6.15905 1.33334 4.66667 2.82572 4.66667 4.66667C4.66667 6.50762 6.15905 8 8 8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M13.7266 14.6667C13.7266 12.0867 11.16 10 7.99998 10C4.83998 10 2.27332 12.0867 2.27332 14.6667" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="activity-content">
                <p class="activity-text"><strong>John Doe</strong> registered as new player</p>
                <p class="activity-time">2 hours ago</p>
              </div>
            </div>

            <div class="activity-item">
              <div class="activity-icon green">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                  <path d="M8 14.6667C11.6819 14.6667 14.6667 11.6819 14.6667 8C14.6667 4.3181 11.6819 1.33334 8 1.33334C4.3181 1.33334 1.33334 4.3181 1.33334 8C1.33334 11.6819 4.3181 14.6667 8 14.6667Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M5.16666 8L7.05333 9.88667L10.8333 6.11334" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="activity-content">
                <p class="activity-text"><strong>Sarah Williams</strong> completed assignment with Abdul Sesay</p>
                <p class="activity-time">5 hours ago</p>
              </div>
            </div>

            <div class="activity-item">
              <div class="activity-icon orange">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                  <path d="M5.33334 2V4.66667" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M10.6667 2V4.66667" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M2.33334 6.06H13.6667" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M14 5.66667V11.3333C14 13.3333 13 14.6667 10.6667 14.6667H5.33333C3 14.6667 2 13.3333 2 11.3333V5.66667C2 3.66667 3 2.33334 5.33333 2.33334H10.6667C13 2.33334 14 3.66667 14 5.66667Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="activity-content">
                <p class="activity-text">Contract expires for <strong>Mohamed Kamara</strong> in 30 days</p>
                <p class="activity-time">1 day ago</p>
              </div>
            </div>

            <div class="activity-item">
              <div class="activity-icon blue">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                  <path d="M8 8C9.84095 8 11.3333 6.50762 11.3333 4.66667C11.3333 2.82572 9.84095 1.33334 8 1.33334C6.15905 1.33334 4.66667 2.82572 4.66667 4.66667C4.66667 6.50762 6.15905 8 8 8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M13.7266 14.6667C13.7266 12.0867 11.16 10 7.99998 10C4.83998 10 2.27332 12.0867 2.27332 14.6667" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="activity-content">
                <p class="activity-text"><strong>Ibrahim Bangura</strong> updated profile information</p>
                <p class="activity-time">2 days ago</p>
              </div>
            </div>

            <div class="activity-item">
              <div class="activity-icon purple">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                  <path d="M5.99999 14.6667H9.99999C13.3333 14.6667 14.6667 13.3333 14.6667 10V6C14.6667 2.66667 13.3333 1.33334 9.99999 1.33334H5.99999C2.66666 1.33334 1.33333 2.66667 1.33333 6V10C1.33333 13.3333 2.66666 14.6667 5.99999 14.6667Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M10.4733 8L8.71999 9.75333L10.4733 11.5067" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M5.52667 8L7.28 9.75333L5.52667 11.5067" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </div>
              <div class="activity-content">
                <p class="activity-text">New assignment pending approval</p>
                <p class="activity-time">3 days ago</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Quick Actions -->
        <div class="dashboard-card quick-actions">
          <div class="card-header">
            <h2 class="card-title">Quick Actions</h2>
          </div>
          <div class="actions-grid">
            <button class="action-btn">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12 5V19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <span>Add Player</span>
            </button>
            <button class="action-btn">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12 5V19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <span>Add Agent</span>
            </button>
            <button class="action-btn">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M9 10C10.1046 10 11 9.10457 11 8C11 6.89543 10.1046 6 9 6C7.89543 6 7 6.89543 7 8C7 9.10457 7.89543 10 9 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M2.67004 18.9501L7.60004 15.6401C8.39004 15.1101 9.53004 15.1701 10.24 15.7801L10.57 16.0701C11.35 16.7401 12.61 16.7401 13.39 16.0701L17.55 12.5001C18.33 11.8301 19.59 11.8301 20.37 12.5001L22 13.9001" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <span>View Reports</span>
            </button>
            <button class="action-btn">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M8 2V5" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M16 2V5" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M3.5 9.09H20.5" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <span>Manage Schedule</span>
            </button>
          </div>
        </div>

        <!-- Agent Performance -->
        <div class="dashboard-card">
          <div class="card-header">
            <h2 class="card-title">Top Agents</h2>
            <a href="#" class="card-link">View All →</a>
          </div>
          <div class="agent-list">
            <div class="agent-item">
              <div class="agent-info">
                <div class="agent-avatar orange">MJ</div>
                <div class="agent-details">
                  <p class="agent-name">Mike Johnson</p>
                  <p class="agent-stat">18 Players</p>
                </div>
              </div>
              <div class="agent-progress">
                <div class="progress-bar">
                  <div class="progress-fill" style="width: 90%;"></div>
                </div>
                <span class="progress-value">90%</span>
              </div>
            </div>

            <div class="agent-item">
              <div class="agent-info">
                <div class="agent-avatar blue">SW</div>
                <div class="agent-details">
                  <p class="agent-name">Sarah Williams</p>
                  <p class="agent-stat">15 Players</p>
                </div>
              </div>
              <div class="agent-progress">
                <div class="progress-bar">
                  <div class="progress-fill" style="width: 75%;"></div>
                </div>
                <span class="progress-value">75%</span>
              </div>
            </div>

            <div class="agent-item">
              <div class="agent-info">
                <div class="agent-avatar green">DC</div>
                <div class="agent-details">
                  <p class="agent-name">David Chen</p>
                  <p class="agent-stat">12 Players</p>
                </div>
              </div>
              <div class="agent-progress">
                <div class="progress-bar">
                  <div class="progress-fill" style="width: 60%;"></div>
                </div>
                <span class="progress-value">60%</span>
              </div>
            </div>

            <div class="agent-item">
              <div class="agent-info">
                <div class="agent-avatar purple">ET</div>
                <div class="agent-details">
                  <p class="agent-name">Emily Taylor</p>
                  <p class="agent-stat">10 Players</p>
                </div>
              </div>
              <div class="agent-progress">
                <div class="progress-bar">
                  <div class="progress-fill" style="width: 50%;"></div>
                </div>
                <span class="progress-value">50%</span>
              </div>
            </div>
          </div>
        </div>
      </div>
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
</body>

</html>