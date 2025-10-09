<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      min-height: 100vh;
      margin: 0;
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #e8f5e9, #f1f8f6);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .glass-container {
      position: relative;
      padding: 40px;
      width: 100%;
      max-width: 450px;
      background: rgba(255, 255, 255, 0.85);
      border: 1px solid rgba(0, 0, 0, 0.05);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      box-shadow: 0 15px 30px rgba(0,0,0,0.08);
      text-align: center;
    }

    .glass-container h1 {
      font-size: 2em;
      font-weight: 600;
      color: #2e7d32;
      margin-bottom: 25px;
    }

    .form-group {
      margin-bottom: 18px;
      text-align: left;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px 14px;
      border: 1px solid #c8e6c9;
      border-radius: 8px;
      font-size: 14px;
      background: #fff;
      color: #333;
      transition: 0.3s ease;
      box-sizing: border-box;
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: #43a047;
      box-shadow: 0 0 6px rgba(67, 160, 71, 0.4);
      outline: none;
    }

    .btn-submit {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 8px;
      background: #2e7d32;
      color: #fff;
      font-size: 1.1em;
      font-weight: 500;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .btn-submit:hover {
      background: #1b5e20;
      transform: translateY(-2px);
    }

    .link-wrapper {
      margin-top: 20px;
    }

    .btn-link {
      display: inline-block;
      padding: 12px 20px;
      background: #66bb6a;
      color: #fff;
      border-radius: 6px;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
    }

    .btn-link:hover {
      background: #388e3c;
      transform: translateY(-2px);
    }
  </style>
</head>
<body>
  <div class="glass-container">
  <h1>Create User</h1>

  <!-- ✅ Error Message -->
  <?php if (!empty($error)): ?>
      <div class="alert alert-danger" style="margin-bottom: 15px; font-size: 0.9em;">
          <?= $error ?>
      </div>
  <?php endif; ?>
  <!-- ✅ End messages -->

  <form id="user-form" action="<?= site_url('users/create/') ?>" method="POST">
      <div class="form-group">
        <input type="text" name="username" placeholder="Username" required 
               value="<?= isset($username) ? html_escape($username) : '' ?>">
      </div>
      <div class="form-group">
        <input type="email" name="email" placeholder="Email" required 
               value="<?= isset($email) ? html_escape($email) : '' ?>">
      </div>
      <div class="form-group">
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <div class="form-group">
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
      </div>
      <div class="form-group">
        <select name="role" required>
          <option value="">-- Select Role --</option>
          <option value="admin" <?= isset($role) && $role=="admin" ? 'selected' : '' ?>>Admin</option>
          <option value="user" <?= isset($role) && $role=="user" ? 'selected' : '' ?>>User</option>
        </select>
      </div>
      <button type="submit" class="btn-submit">Create User</button>
  </form>

  <div class="link-wrapper">
    <a href="<?= site_url('/users'); ?>" class="btn-link">Cancel</a>
  </div>

  </div>
</body>
</html>
