<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

  <!-- Font Awesome for eye icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      min-height: 100vh;
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #e3f2fd, #f5f9ff); /* blue gradient */
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .register-container {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      padding: 40px;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 15px 30px rgba(0,0,0,0.1);
      text-align: center;
    }

    .register-container h2 {
      font-size: 2em;
      font-weight: 600;
      color: #1565c0; /* professional blue */
      margin-bottom: 20px;
    }

    .form-group {
      position: relative;
      margin-bottom: 18px;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px 40px 12px 14px;
      font-size: 14px;
      border: 1px solid #bbdefb; /* light blue */
      border-radius: 8px;
      background: #fff;
      color: #333;
      transition: 0.3s ease;
      box-sizing: border-box;
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: #1e88e5; /* bright blue */
      box-shadow: 0 0 6px rgba(30, 136, 229, 0.4);
      outline: none;
    }

    .toggle-password {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #1e88e5; /* blue icon */
    }

    .btn-submit {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 8px;
      background: #1565c0; /* dark blue */
      color: #fff;
      font-size: 1.1em;
      font-weight: 500;
      cursor: pointer;
      transition: 0.3s ease;
      margin-top: 5px;
    }

    .btn-submit:hover {
      background: #0d47a1; /* navy blue */
      transform: translateY(-2px);
    }

    .group {
      margin-top: 15px;
      font-size: 0.9em;
    }

    .group a {
      color: #1565c0;
      font-weight: 500;
      text-decoration: none;
      transition: 0.2s;
    }

    .group a:hover {
      text-decoration: underline;
      color: #0d47a1;
    }

    /* Error box */
    .error-box {
      background: rgba(244, 67, 54, 0.1);
      color: #d32f2f;
      padding: 10px;
      border: 1px solid #e57373;
      border-radius: 8px;
      margin-bottom: 20px;
      font-size: 0.95em;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <h2>Register</h2>
    <?php if (!empty($error)): ?>
      <div class="error-box">
          <?= $error ?>
      </div>
    <?php endif; ?>
    <form method="POST" action="<?= site_url('auth/register'); ?>">
      
      <div class="form-group">
        <input type="text" name="username" placeholder="Username" required>
      </div>

      <div class="form-group">
        <input type="email" name="email" placeholder="Email" required>
      </div>

      <!-- Password field -->
      <div class="form-group">
        <input type="password" id="password" name="password" placeholder="Password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <!-- Confirm Password field -->
      <div class="form-group">
        <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
        <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPassword"></i>
      </div>

      <div class="form-group">
        <select name="role" required>
          <option value="user" selected>User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <button type="submit" class="btn-submit">Register</button>
    </form>

    <div class="group">
      Already have an account? <a href="<?= site_url('auth/login'); ?>">Login here</a>
    </div>
  </div>
  
  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.type === 'password' ? 'text' : 'password';
        input.type = type;

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>
</html>