<?php 
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); 
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <style>
        body {
            font-family: "Poppins", Arial, sans-serif;
            background: linear-gradient(135deg, #fbc2eb, #a6c1ee);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 420px;
            background: #fff;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
            animation: fadeIn 0.8s ease-in-out;
            border: 3px solid #f8b6d8;
        }

        h1 {
            text-align: center;
            color: #d63384;
            margin-bottom: 25px;
            font-size: 28px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            color: #7b2cbf;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 20px;
            border: 2px solid #fbc2eb;
            border-radius: 12px;
            box-sizing: border-box;
            font-size: 15px;
            transition: 0.3s;
            background: #fff5fa;
        }

        input[type="text"]:focus, input[type="email"]:focus {
            border-color: #ff6fb5;
            outline: none;
            box-shadow: 0 0 8px rgba(255,111,181,0.4);
        }

        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #ff6fb5, #d63384);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: linear-gradient(135deg, #e85d9f, #b71f6e);
            transform: translateY(-2px);
            box-shadow: 0 5px 18px rgba(0,0,0,0.2);
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #6a11cb;
            text-decoration: none;
            font-weight: 600;
        }

        .back-link:hover {
            text-decoration: underline;
            color: #ff6fb5;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🌸 Add User 🌸</h1>

        <form method="post" action="<?= site_url('users/create') ?>">
            <label for="username">✨ Username</label>
            <input type="text" name="username" id="username" required>

            <label for="email">💌 Email</label>
            <input type="email" name="email" id="email" required>

            <button type="submit">💖 Save User</button>
        </form>

        <a href="<?= site_url('users') ?>" class="back-link">⬅ Back to User List</a>
    </div>
</body>
</html>
