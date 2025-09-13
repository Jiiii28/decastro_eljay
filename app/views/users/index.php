<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <style>
        /* Background Gradient */
        body {
            font-family: "Poppins", Arial, sans-serif;
            background: linear-gradient(135deg, #fbc2eb, #a6c1ee);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        /* Card Container */
        .container {
            width: 100%;
            max-width: 1000px;
            background: #fff;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            margin: 40px auto;
            animation: fadeIn 0.8s ease-in-out;
            border: 3px solid #f8b6d8;
        }

        h1 {
            text-align: center;
            color: #d63384;
            margin-bottom: 25px;
            font-size: 30px;
        }

        /* Add Button */
        .add-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 12px 20px;
            background: linear-gradient(135deg, #ff6fb5, #d63384);
            color: #fff;
            text-decoration: none;
            border-radius: 12px;
            font-weight: bold;
            transition: 0.3s;
        }

        .add-btn:hover {
            background: linear-gradient(135deg, #e85d9f, #b71f6e);
            box-shadow: 0 5px 18px rgba(0,0,0,0.2);
            transform: translateY(-2px);
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            overflow: hidden;
            border-radius: 12px;
        }

        th, td {
            padding: 14px;
            border-bottom: 1px solid #f3d1eb;
            text-align: center;
            font-size: 15px;
        }

        th {
            background: linear-gradient(135deg, #ff6fb5, #d63384);
            color: white;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background: #fff5fa;
        }

        tr:hover {
            background: #ffe3f1;
        }

        /* Action Links */
        .action-links a {
            margin: 0 5px;
            text-decoration: none;
            color: #d63384;
            font-weight: 600;
            transition: 0.2s;
        }

        .action-links a:hover {
            color: #ff6fb5;
            text-decoration: underline;
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🌸 Users List</h1>

        <a href="<?=site_url('users/create');?>" class="add-btn">➕ Add New User</a>

        <table>
            <tr>
                <th>ID</th>
                <th>👩 Username</th>
                <th>💌 Email</th>
                <th>⚙️ Action</th>
            </tr>
            <?php foreach(html_escape($users) as $user): ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['username']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td class="action-links">
                        <a href="<?= site_url('users/update/'.$user['id']); ?>">✏️ Update</a> | 
                        <a href="<?= site_url('users/delete/'.$user['id']); ?>">🗑️ Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
