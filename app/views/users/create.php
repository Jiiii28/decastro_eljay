<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: linear-gradient(135deg, #a8e063, #56ab2f);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .glass-container {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            width: 400px;
            padding: 2rem;
            text-align: center;
            color: white;
        }

        h1 {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: #fff;
            text-shadow: 0 0 8px rgba(255,255,255,0.4);
        }

        label {
            display: block;
            text-align: left;
            margin-top: 10px;
            font-size: 0.9rem;
            color: #e0ffe0;
        }

        input, select {
            width: 100%;
            padding: 0.8rem;
            margin-top: 5px;
            border: none;
            border-radius: 8px;
            outline: none;
            background: rgba(255, 255, 255, 0.3);
            color: #fff;
            font-size: 1rem;
        }

        input::placeholder {
            color: rgba(255,255,255,0.7);
        }

        select option {
            background: #56ab2f;
        }

        button {
            margin-top: 1.5rem;
            width: 100%;
            padding: 0.8rem;
            background: linear-gradient(90deg, #43a047, #2e7d32);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: bold;
            transition: 0.3s;
        }

        button:hover {
            background: linear-gradient(90deg, #66bb6a, #43a047);
        }

        a.back {
            display: block;
            margin-top: 10px;
            color: #e0ffe0;
            text-decoration: none;
            font-size: 0.9rem;
        }

        a.back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="glass-container">
        <h1>Create New User</h1>

        <form action="<?=site_url('users/store');?>" method="post">
            <label>Username:</label>
            <input type="text" name="username" placeholder="Enter username" required>

            <label>Email:</label>
            <input type="email" name="email" placeholder="Enter email" required>

            <label>Password:</label>
            <input type="password" name="password" placeholder="Enter password" required>

            <label>Role:</label>
            <select name="role" required>
                <option value="">Select role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>

            <button type="submit">Create User</button>
        </form>
        <a href="<?=site_url('users');?>" class="back">← Back to Users List</a>
    </div>
</body>
</html>
