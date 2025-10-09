<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(160deg, #e8f5e9, #c8e6c9);
            color: #388e3c;
            text-align: center;
            padding-top: 100px;
            margin: 0;
        }
        .card {
            background: #ffffff;
            width: 400px;
            margin: auto;
            padding: 30px;
            border-radius: 14px;
            border: 2px solid #a5d6a7;
            box-shadow: 0 10px 30px rgba(56,142,60,.12), 0 4px 12px rgba(76,175,80,.10);
        }
        h2 {
            color: #388e3c;
        }
        p {
            color: #333;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background: linear-gradient(135deg, #388e3c 0%, #43a047 100%);
            color: white;
            border-radius: 10px;
            text-decoration: none;
            border: 2px solid #388e3c;
            box-shadow: 0 2px 8px rgba(56,142,60,.15);
            transition: transform .08s ease, box-shadow .2s ease, background-color .2s ease;
        }
        a:hover {
            background: linear-gradient(135deg, #43a047 0%, #66bb6a 100%);
            border-color: #43a047;
        }
            font-weight: bold;
        }
        a:hover {
            background: #2e7d32;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Welcome, <?= html_escape($username) ?> 👋</h2>
        <p>You are now logged in successfully.</p>
        <a href="<?= site_url('auth/logout') ?>">Logout</a>
    </div>
</body>
</html>
