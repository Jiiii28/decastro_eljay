<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<style>
    * { box-sizing: border-box; }
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        color: #388e3c;
        background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    /* Background decoration */
    .bg-decor {
        position: fixed;
        inset: 0;
        z-index: -1;
        pointer-events: none;
        background:
            radial-gradient(600px 600px at 0% 0%, rgba(56,142,60,.12), transparent 60%),
            radial-gradient(600px 600px at 100% 0%, rgba(76,175,80,.10), transparent 60%),
            radial-gradient(600px 600px at 0% 100%, rgba(139,195,74,.08), transparent 60%),
            radial-gradient(600px 600px at 100% 100%, rgba(102,187,106,.10), transparent 60%);
        animation: floatBg 16s ease-in-out infinite alternate;
    }

    /* Card container */
    .card {
        background: #ffffff;
        border: 2px solid #a5d6a7;
        border-radius: 14px; 
        box-shadow: 0 10px 30px rgba(0,0,0,.12), 0 4px 12px rgba(0,0,0,.08); 
        padding: 30px; 
        width: 350px; 
        text-align: center; 
        animation: cardIn .6s ease-out forwards;
    }

    .card-header h2 {
        margin: 0;
        font-size: 24px;
        color: #000000;
        margin-bottom: 20px;
    }

    input {
        width: 100%; 
        padding: 10px 14px; 
        margin: 8px 0; 
        border: 1px solid #ccc; 
        border-radius: 10px; 
        font-size: 14px;
    }

    .btn-primary {
        width: 100%;
        padding: 10px 14px;
        background: linear-gradient(135deg, #000000 0%, #333333 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s ease;
        margin-top: 10px;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #333333 0%, #555555 100%);
    }

    .message {
        margin-top: 15px;
        font-size: 14px;
        color: red;
    }

    .message.success {
        color: green;
    }

    a {
        color: #43a047; 
        text-decoration: none; 
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }

    @keyframes cardIn { to { transform: translateY(0); opacity: 1; } }
    @keyframes floatBg { 
        0% { background-position: 0% 0%, 100% 0%, 0% 100%, 100% 100%; } 
        100% { background-position: 10% 5%, 90% 10%, 5% 90%, 95% 95%; } 
    }
</style>
</head>
<body>
<div class="bg-decor"></div>
<div class="card">
    <div class="card-header">
        <h2>Login</h2>
    </div>

    <?php if (!empty($flash['error'])): ?>
        <p class="message"><?= $flash['error'] ?></p>
    <?php endif; ?>
    <?php if (!empty($flash['success'])): ?>
        <p class="message success"><?= $flash['success'] ?></p>
    <?php endif; ?>

    <form method="POST" action="<?= site_url('auth/login') ?>">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn-primary">Login</button>
    </form>

    <p class="message">
        Don’t have an account? 
        <a href="<?= site_url('auth/register') ?>">Register here</a>
    </p>
</div>
</body>
</html>
