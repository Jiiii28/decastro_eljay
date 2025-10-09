<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <style>
        * {
            font-family: "Poppins", sans-serif;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #a8e063, #56ab2f);
            margin: 0;
            padding: 40px;
            color: #fff;
        }

        .glass-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
            text-shadow: 0 0 10px rgba(255,255,255,0.4);
        }

        .top-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .create-btn {
            background: linear-gradient(90deg, #43a047, #2e7d32);
            padding: 10px 18px;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .create-btn:hover {
            background: linear-gradient(90deg, #66bb6a, #43a047);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        th {
            background: rgba(255,255,255,0.2);
        }

        tr:hover {
            background: rgba(255,255,255,0.1);
        }

        a.action-btn {
            background: #43a047;
            color: white;
            padding: 5px 10px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: 0.3s;
        }

        a.action-btn:hover {
            background: #66bb6a;
        }

        a.delete-btn {
            background: #c62828;
        }

        a.delete-btn:hover {
            background: #ef5350;
        }
    </style>
</head>
<body>
    <div class="glass-container">
        <h1>Users List</h1>

        <div class="top-actions">
            <span></span>
            <a href="<?=site_url('users/create');?>" class="create-btn">+ Add New User</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <?php if ($logged_in_user['role'] === 'admin'): ?>
                        <th>Role</th>
                    <?php endif; ?>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?=html_escape($user['id']); ?></td>
                        <td><?=html_escape($user['username']); ?></td>
                        <td><?=html_escape($user['email']); ?></td>
                        <?php if ($logged_in_user['role'] === 'admin'): ?>
                            <td><?=html_escape($user['role']); ?></td>
                        <?php endif; ?>
                        <td>
                            <a href="<?=site_url('/users/edit/'.$user['id']);?>" class="action-btn">Edit</a>
                            <a href="<?=site_url('/users/delete/'.$user['id']);?>" class="action-btn delete-btn" onclick="return confirm('Delete this user?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
