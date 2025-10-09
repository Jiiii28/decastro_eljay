<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update User</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
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
      background: rgba(255, 255, 255, 0.9);
      border: 1px solid rgba(0, 0, 0, 0.05);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      box-shadow: 0 15px 30px rgba(0,0,0,0.1);
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
      position: relative;
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

    .toggle-password {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #43a047;
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

    .btn-return {
      display: inline-block;
      margin-top: 20px;
      padding: 12px 20px;
      background: #66bb6a;
      color: #fff;
      border-radius: 6px;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
    }

    .btn-return:hover {
      background: #388e3c;
      transform: translateY(-2px);
    }
  </style>
</head>
<body>
  <div class="glass-container">
    <h1>Update User</h1>
    <form action="<?=site_url('users/update/'.$user['id'])?>" method="POST">
      <div class="form-group">
        <input type="text" name="username" value="<?=html_escape($user['username']);?>" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input type="email" name="email" value="<?=html_escape($user['email']);?>" placeholder="Email" required>
      </div>

              <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
          <div class="form-group">
            <select name="role" required>
              <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
              <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
            </select>
          </div>

          <div class="form-group">
            <input type="password" placeholder="New Password (leave blank if unchanged)" 
                  name="password" id="password">
            <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
          </div>
        <?php endif; ?>


      <button type="submit" class="btn-submit">Update User</button>
    </form>
    <a href="<?=site_url('/users');?>" class="btn-return">Cancel</a>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    if (togglePassword) {
      togglePassword.addEventListener('click', function () {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }
  </script>
</body>
</html>
