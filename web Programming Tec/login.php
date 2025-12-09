<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login — Street Bull</title>
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
        <a href="services.html">Service</a>
        <a href="about.html">About</a>
        <a href="players.php">Players</a>
        <a href="dashboard.php">Dashboard</a>
      </nav>
      <div style="display:flex; gap:10px;">
        <a href="login.php" style="text-decoration:none; color:#666; font-weight:600; padding:10px;">Login</a>
        <a href="contact.php" class="btn-contact">Contact Us</a>
      </div>
    </div>
  </header>

  <main style="padding-top:140px; display:flex; justify-content:center; padding-bottom:60px;">
    <div
      style="width:400px; background:#fff; padding:32px; border-radius:12px; box-shadow:0 8px 24px rgba(0,0,0,0.08);">
      <h2 style="margin-top:0; color:var(--navy);">Login</h2>
      <form id="login-form">
        <div style="margin-bottom:16px;">
          <label style="display:block; margin-bottom:8px; font-weight:600;">Email</label>
          <input type="email" name="email" required
            style="width:100%; padding:12px; border-radius:8px; border:1px solid #ddd;" />
        </div>
        <div style="margin-bottom:24px;">
          <label style="display:block; margin-bottom:8px; font-weight:600;">Password</label>
          <input type="password" name="password" required
            style="width:100%; padding:12px; border-radius:8px; border:1px solid #ddd;" />
        </div>
        <button class="btn primary" type="submit" style="width:100%;">Login</button>
      </form>
      <p style="margin-top:16px; font-size:14px; text-align:center;">
        Don't have an account? <a href="register.php"
          style="color:var(--orange); text-decoration:none; font-weight:600;">Register</a>
      </p>
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
    <div style="text-align:center;margin-top:24px;color:var(--medium-gray);">© 2025 Street Bull — Football Agent Sierra
      Leone</div>
  </footer>

  <script>
    document.getElementById('login-form').addEventListener('submit', async function(e) {
      e.preventDefault();

      const formData = new FormData(this);
      const data = Object.fromEntries(formData.entries());

      try {
        const response = await fetch('php/auth.php?action=login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(data)
        });

        const result = await response.json();

        if (response.ok && result.success) {
          window.location.href = 'dashboard.php';
        } else {
          alert('Error: ' + (result.error || 'Login failed'));
        }
      } catch (err) {
        console.error(err);
        alert('An network error occurred.');
      }
    });
  </script>
</body>

</html>