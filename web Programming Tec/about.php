<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>About Us — Street Bull</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/css/styles-about.css">
</head>

<body>
  <!-- Header -->
  <header class="site-header">
    <div class="header-pill">
      <div class="logo">STREET BULL</div>
      <nav>
        <a href="index.php">Home</a>
        <a href="services.php">Service</a>
        <a href="about.php" class="active">About</a>
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
    <section class="about-hero">
      <div class="about-hero-content">
        <h1 class="about-hero-title">About Street Bull</h1>
        <p class="about-hero-subtitle">Empowering the next generation of football legends through dedication, mentorship, and opportunity.</p>
      </div>
    </section>

    <!-- Mission & Vision -->
    <section class="mission-section">
      <div class="mission-container">
        <div class="mission-grid">
          <div class="mission-card">
            <div class="mission-icon">
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
                <path d="M24 44C35.0457 44 44 35.0457 44 24C44 12.9543 35.0457 4 24 4C12.9543 4 4 12.9543 4 24C4 35.0457 12.9543 44 24 44Z" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M24 16V24L28 28" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <h2 class="mission-title">Our Mission</h2>
            <p class="mission-text">To empower youth through sports, fostering discipline, teamwork, and excellence. We bridge the gap between street football and professional leagues, providing young talents with the platform, mentorship, and opportunities they need to succeed.</p>
          </div>

          <div class="mission-card">
            <div class="mission-icon orange">
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
                <path d="M24 44C35.0457 44 44 35.0457 44 24C44 12.9543 35.0457 4 24 4C12.9543 4 4 12.9543 4 24C4 35.0457 12.9543 44 24 44Z" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M24 14V24L32 28" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M10 24H6" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M42 24H38" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <h2 class="mission-title">Our Vision</h2>
            <p class="mission-text">To be the leading catalyst for football development in West Africa, creating a world where every talented player has the chance to shine on the global stage, regardless of their background or circumstances.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Story Section -->
    <section class="story-section">
      <div class="story-container">
        <div class="story-content">
          <span class="story-label">Our Story</span>
          <h2 class="story-title">From the Streets to the Stadiums</h2>
          <p class="story-text">Street Bull was born from a simple observation: Sierra Leone is home to incredible football talent that often goes unnoticed. In the dusty streets of Freetown and beyond, young players showcase skills that rival professional athletes, yet lack the connections and support to reach the next level.</p>
          <p class="story-text">Founded in 2020, we set out to change this narrative. Our team of experienced agents, scouts, and former professional players work tirelessly to identify, develop, and connect talented athletes with opportunities that can transform their lives.</p>
          <p class="story-text">Today, we've helped over 100 players secure professional contracts, scholarships, and life-changing opportunities. But we're just getting started.</p>
        </div>
        <div class="story-image">
          <img src="https://images.unsplash.com/photo-1574629810360-7efbbe195018?w=600&h=800&fit=crop" alt="Football players training">
        </div>
      </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
      <div class="values-container">
        <h2 class="values-main-title">Our Core Values</h2>
        <div class="values-grid">
          <div class="value-card">
            <div class="value-icon">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path d="M16 28C22.6274 28 28 22.6274 28 16C28 9.37258 22.6274 4 16 4C9.37258 4 4 9.37258 4 16C4 22.6274 9.37258 28 16 28Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M16 10V16L20 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <h3 class="value-title">Integrity</h3>
            <p class="value-desc">We operate with honesty and transparency in all our dealings, putting the welfare of our players first.</p>
          </div>

          <div class="value-card">
            <div class="value-icon">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path d="M16 2L19.09 11.26L28.5 12.18L21.77 18.14L23.64 27.5L16 22.77L8.36 27.5L10.23 18.14L3.5 12.18L12.91 11.26L16 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <h3 class="value-title">Excellence</h3>
            <p class="value-desc">We strive for the highest standards in player development, training, and professional representation.</p>
          </div>

          <div class="value-card">
            <div class="value-icon">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path d="M16 20C18.2091 20 20 18.2091 20 16C20 13.7909 18.2091 12 16 12C13.7909 12 12 13.7909 12 16C12 18.2091 13.7909 20 16 20Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M26.9 20C26.7323 20.4014 26.6954 20.8457 26.7945 21.2704C26.8935 21.695 27.1237 22.0782 27.4533 22.3667L27.56 22.4733C27.8088 22.7221 27.9997 23.0187 28.1217 23.345C28.2437 23.6713 28.2944 24.0204 28.2705 24.3683C28.2466 24.7162 28.1487 25.0557 27.9827 25.3651C27.8168 25.6746 27.586 25.9471 27.3067 26.1667C27.0273 26.3863 26.7051 26.5486 26.3597 26.6437C26.0143 26.7389 25.653 26.765 25.297 26.7206C24.941 26.6762 24.5979 26.5621 24.2882 26.3852C23.9785 26.2083 23.709 25.9723 23.4967 25.6917L23.39 25.585C23.1015 25.2554 22.7183 25.0252 22.2937 24.9262C21.869 24.8271 21.4247 24.864 21.0233 25.0317C20.6275 25.1931 20.2887 25.4687 20.0505 25.8235C19.8123 26.1782 19.6853 26.5968 19.685 27.025V27.25C19.685 27.9403 19.4104 28.6022 18.9228 29.0899C18.4351 29.5775 17.7732 29.8521 17.0828 29.8521C16.3925 29.8521 15.7306 29.5775 15.2429 29.0899C14.7553 28.6022 14.4807 27.9403 14.4807 27.25V27.1C14.4687 26.6587 14.3243 26.2312 14.0662 25.8742C13.808 25.5172 13.4484 25.2469 13.035 25.1C12.6336 24.9323 12.1893 24.8954 11.7647 24.9945C11.34 25.0935 10.9568 25.3237 10.6683 25.6533L10.5617 25.76C10.2811 25.9723 9.95152 26.1264 9.59551 26.2126C9.23951 26.2987 8.86771 26.315 8.50377 26.2606C8.13983 26.2061 7.79251 26.0819 7.48305 25.896C7.17359 25.7102 6.90903 25.4666 6.70666 25.1791C6.50429 24.8915 6.36852 24.5663 6.30758 24.2236C6.24663 23.8809 6.26174 23.529 6.35191 23.1924C6.44208 22.8559 6.60522 22.5421 6.83041 22.2718C7.05559 22.0015 7.33768 21.7807 7.65833 21.6233L7.765 21.5167C8.09459 21.2282 8.32479 20.845 8.42383 20.4204C8.52287 19.9957 8.48598 19.5514 8.31833 19.15C8.15688 18.7542 7.88125 18.4154 7.52649 18.1772C7.17173 17.939 6.75321 17.8121 6.325 17.8117H6.1C5.40966 17.8117 4.74773 17.5371 4.26009 17.0494C3.77245 16.5618 3.49783 15.8999 3.49783 15.2095C3.49783 14.5192 3.77245 13.8573 4.26009 13.3696C4.74773 12.882 5.40966 12.6074 6.1 12.6074H6.215C6.65626 12.5954 7.08375 12.451 7.44076 12.1928C7.79777 11.9347 8.06804 11.575 8.215 11.1617C8.38265 10.7603 8.41954 10.316 8.3205 9.89135C8.22146 9.4667 7.99126 9.08347 7.66166 8.795L7.555 8.68833C7.34267 8.40781 7.18858 8.08824 7.10247 7.74674C7.01636 7.40524 6.99987 7.04948 7.054 6.70106C7.10813 6.35263 7.23177 6.01927 7.41764 5.71982C7.60351 5.42037 7.84786 5.16089 8.13542 4.95852C8.42297 4.75615 8.74817 4.61513 9.09086 4.54419C9.43355 4.47325 9.78707 4.47381 10.1295 4.54583C10.472 4.61785 10.7968 4.75991 11.0835 4.96317C11.3703 5.16642 11.6135 5.42666 11.7983 5.72667L11.905 5.83333C12.1935 6.16293 12.5768 6.39313 13.0014 6.49216C13.426 6.5912 13.8704 6.55432 14.2717 6.38667H14.3667C14.7625 6.22521 15.1013 5.94959 15.3395 5.59482C15.5777 5.24006 15.7046 4.82154 15.705 4.39333V4.16833C15.705 3.478 15.9796 2.81607 16.4672 2.32843C16.9549 1.84079 17.6168 1.56617 18.3072 1.56617C18.9975 1.56617 19.6594 1.84079 20.1471 2.32843C20.6347 2.81607 20.9093 3.478 20.9093 4.16833V4.28333C20.9097 4.71154 21.0366 5.13007 21.2748 5.48483C21.513 5.8396 21.8518 6.11521 22.2477 6.27667C22.649 6.44432 23.0933 6.4812 23.5179 6.38216C23.9426 6.28313 24.3258 6.05293 24.6143 5.72333L24.721 5.61667C25.0016 5.40434 25.3212 5.25024 25.6627 5.16413C26.0042 5.07802 26.3599 5.06153 26.7084 5.11566C27.0568 5.1698 27.3902 5.29344 27.6896 5.47931C27.9891 5.66518 28.2485 5.90953 28.4509 6.19708C28.6533 6.48464 28.7943 6.80984 28.8652 7.15253C28.9362 7.49522 28.9356 7.84874 28.8635 8.19118C28.7915 8.53361 28.6495 8.85826 28.4463 9.14502C28.243 9.43178 27.9828 9.67502 27.6817 9.86L27.575 9.96667C27.2454 10.2552 27.0152 10.6384 26.9162 11.063C26.8171 11.4877 26.854 11.932 27.0217 12.3333V12.4283C27.1831 12.8242 27.4587 13.163 27.8135 13.4012C28.1683 13.6393 28.5868 13.7663 29.015 13.7667H29.24C29.9303 13.7667 30.5923 14.0413 31.0799 14.5289C31.5675 15.0166 31.8422 15.6785 31.8422 16.3688C31.8422 17.0592 31.5675 17.7211 31.0799 18.2087C30.5923 18.6964 29.9303 18.971 29.24 18.971H29.125C28.6968 18.9713 28.2783 19.0983 27.9235 19.3365C27.5688 19.5746 27.2932 19.9135 27.1317 20.3093V20.3093Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <h3 class="value-title">Commitment</h3>
            <p class="value-desc">We are dedicated to the long-term success and well-being of every player we represent.</p>
          </div>

          <div class="value-card">
            <div class="value-icon">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path d="M16 20C18.2091 20 20 18.2091 20 16C20 13.7909 18.2091 12 16 12C13.7909 12 12 13.7909 12 16C12 18.2091 13.7909 20 16 20Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M27.3133 18.6667C27.1467 19.32 27.2 20.0133 27.4667 20.64L29.3333 24.6667L24.6667 27.3333L22.8 23.3067C22.2933 22.6933 21.56 22.2933 20.7733 22.1867L20 22.0667V28H12V22.0667L11.2267 22.1867C10.44 22.2933 9.70667 22.6933 9.2 23.3067L7.33333 27.3333L2.66667 24.6667L4.53333 20.64C4.8 20.0133 4.85333 19.32 4.68667 18.6667L4 16L4.68667 13.3333C4.85333 12.68 4.8 11.9867 4.53333 11.36L2.66667 7.33333L7.33333 4.66667L9.2 8.69333C9.70667 9.30667 10.44 9.70667 11.2267 9.81333L12 9.93333V4H20V9.93333L20.7733 9.81333C21.56 9.70667 22.2933 9.30667 22.8 8.69333L24.6667 4.66667L29.3333 7.33333L27.4667 11.36C27.2 11.9867 27.1467 12.68 27.3133 13.3333L28 16L27.3133 18.6667Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <h3 class="value-title">Community</h3>
            <p class="value-desc">We believe in giving back and supporting local football communities across Sierra Leone.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
      <div class="stats-container">
        <div class="stat-item">
          <h3 class="stat-number">100+</h3>
          <p class="stat-label">Players Represented</p>
        </div>
        <div class="stat-item">
          <h3 class="stat-number">50+</h3>
          <p class="stat-label">Professional Contracts</p>
        </div>
        <div class="stat-item">
          <h3 class="stat-number">15+</h3>
          <p class="stat-label">Partner Clubs</p>
        </div>
        <div class="stat-item">
          <h3 class="stat-number">5</h3>
          <p class="stat-label">Years of Excellence</p>
        </div>
      </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
      <div class="team-container">
        <div class="team-header">
          <h2 class="team-title">Meet Our Team</h2>
          <p class="team-subtitle">Dedicated professionals committed to your success</p>
        </div>
        <div class="team-grid">
          <div class="team-card">
            <div class="team-image">
              <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&h=400&fit=crop" alt="Team member">
            </div>
            <div class="team-info">
              <h3 class="team-name">Mohamed Kamara</h3>
              <p class="team-role">Founder & CEO</p>
              <p class="team-bio">Former professional player with 10+ years of experience in talent management.</p>
            </div>
          </div>

          <div class="team-card">
            <div class="team-image">
              <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=400&fit=crop" alt="Team member">
            </div>
            <div class="team-info">
              <h3 class="team-name">Sarah Williams</h3>
              <p class="team-role">Head of Scouting</p>
              <p class="team-bio">Expert scout with connections across West African football leagues.</p>
            </div>
          </div>

          <div class="team-card">
            <div class="team-image">
              <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop" alt="Team member">
            </div>
            <div class="team-info">
              <h3 class="team-name">Ibrahim Sesay</h3>
              <p class="team-role">Player Development Coach</p>
              <p class="team-bio">Specialized in youth development and professional transition programs.</p>
            </div>
          </div>

          <div class="team-card">
            <div class="team-image">
              <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400&h=400&fit=crop" alt="Team member">
            </div>
            <div class="team-info">
              <h3 class="team-name">Aminata Bangura</h3>
              <p class="team-role">Legal Advisor</p>
              <p class="team-bio">Ensures all contracts and agreements protect our players' interests.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
      <div class="cta-container">
        <div class="cta-content">
          <h2 class="cta-title">Ready to Start Your Journey?</h2>
          <p class="cta-text">Join Street Bull today and take the first step towards your professional football career.</p>
          <div class="cta-buttons">
            <a href="register.html" class="cta-btn primary">Get Started</a>
            <a href="contact.html" class="cta-btn secondary">Contact Us</a>
          </div>
        </div>
      </div>
    </section>
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