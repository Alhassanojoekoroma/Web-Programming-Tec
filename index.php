<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Street Bull — Football Agent Sierra Leone</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/styles-landing.css">
</head>

<body>
  <!-- Header -->
  <header class="site-header">
    <div class="header-pill">
      <div class="logo">STREET BULL</div>
      <nav>
        <a href="index.php" class="active">Home</a>
        <a href="services.php">Service</a>
        <a href="about.php">About</a>
        <a href="players.php">Players</a>
        <a href="dashboard.php">Dashboard</a>
      </nav>
      <div class="header-actions">
        <?php
        session_start();
        if (isset($_SESSION['user_id'])): ?>
          <button onclick="logout()" class="btn-login" style="background:none; border:none; cursor:pointer;">Sign Out</button>
        <?php else: ?>
          <a href="login.php" class="btn-login">Login</a>
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

  <main>
    <!-- Hero Section -->
    <section class="hero" id="home">
      <div class="hero-container">
        <div class="hero-content">
          <h1 class="hero-title">BECOME A<br>LEGEND POWER</h1>
          <p class="hero-text">Welcome to Street Bull the home of real street football energy.</p>
          <a class="hero-btn" href="register.php">Join the Street</a>
        </div>
        <div class="hero-media">
          <img src="images/image1.png" alt="Player celebrating" class="hero-img" />
        </div>
      </div>
    </section>

    <!-- Energy Section -->
    <section class="energy-section">
      <div class="energy-image">
        <img src="images/game-1.png" alt="Street Football Energy" />
      </div>
      <div class="energy-content">
        <h2 class="energy-title">THE STREET ENERGY WILL CONTINUE</h2>
        <p class="energy-text">Feel the rush of Freetown's streets come alive in every match. From the sound of the crowd to the dust under your boots — Street Bull brings that real street football feel straight to your screen.</p>
      </div>
    </section>

    <!-- Dark Features Section -->
    <section class="dark-section">
      <h2 class="dark-section-title">THE STREET ENERGY WILL CONTINUE</h2>
      <div class="features-container">
        <div class="feature-text">
          <h3 class="feature-title">Community Challenges</h3>
          <p class="feature-desc">Join weekly and monthly street football tournaments. Test your skills, test your hood. Best with real feat prizes. Na ur game for real call dem.</p>
        </div>
        <div class="feature-image">
          <img src="images/game-2.png" alt="Basketball Court Action" />
        </div>
        <div class="feature-image">
          <img src="images/game-3.png" alt="Street Football Match" />
        </div>
        <div class="feature-text right">
          <h3 class="feature-title">Build Your Legend</h3>
          <p class="feature-desc">Customize your player, form a team, and carve the street legends path. Every win, every trick, every move tells your story.</p>
        </div>
      </div>
    </section>

    <!-- Types of Games Section -->
    <section class="games-section" id="features">
      <div class="games-container">
        <h2 class="games-title">TYPES OF GAMES</h2>
        <div class="games-grid">
          <article class="game-card">
            <div class="game-card-inner">
              <img src="images/game-1.png" alt="Community Challenges" />
            </div>
          </article>
          <article class="game-card">
            <div class="game-card-inner">
              <img src="images/game-2.png" alt="Build Your Legend" />
            </div>
          </article>
          <article class="game-card">
            <div class="game-card-inner">
              <img src="images/game-3.png" alt="Street Tournaments" />
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section class="about-section" id="about">
      <div class="about-container">
        <h2 class="about-title">About Street Bull</h2>
        <div class="about-content">
          <p class="about-text">
            Street Bull is more than a platform — it's a movement to empower the next generation of football stars.
            We bridge the gap between street football and professional leagues, providing young talents with the platform,
            mentorship, and opportunities they need to succeed.
          </p>
          <p class="about-text">
            Our mission is to empower youth through sports, fostering discipline, teamwork, and excellence. Whether you're
            playing in a local community challenge or a major tournament, Street Bull is watching.
          </p>
        </div>
      </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section" id="subscribe">
      <div class="newsletter-container">
        <div class="newsletter-info">
          <span class="contact-tag">Contact Us</span>
          <h3 class="newsletter-heading">Email: streetbull@gmail.com</h3>
          <p class="newsletter-detail">Phone: +232 78348219</p>
          <p class="newsletter-detail">Address: 1234 Main St</p>
          <p class="newsletter-detail">Freetown, Sierra Leone</p>
          <div class="newsletter-links">
            <a href="#features">Features</a>
            <a href="about.html">Why Starting</a>
            <a href="services.html">Services</a>
            <a href="players.php">View Players</a>
          </div>
        </div>
        <div class="newsletter-form-wrapper">
          <form id="subscribe-form" class="newsletter-form">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" placeholder="Enter your email" required />
            </div>
            <button type="submit" class="subscribe-btn">Subscribe To News</button>
          </form>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="site-footer" id="contact">
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
        <h4>About</h4>
        <p>Street Bull connects street talent to professional opportunities across Sierra Leone.</p>
      </div>
    </div>
    <div class="footer-bottom">
      © 2025 Street Bull — Football Agent Sierra Leone
    </div>
  </footer>

  <script>
    // Subscribe form handler
    document.getElementById('subscribe-form').addEventListener('submit', function(e) {
      e.preventDefault();
      const email = this.email.value.trim();
      if (!email) {
        alert('Please enter your email address');
        return;
      }
      alert('Thanks! We will contact you at ' + email);
      this.reset();
    });
  </script>
</body>

</html>