<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
    <style>
        * { box-sizing: border-box; }
    body { margin: 0; font-family: Arial, Helvetica, sans-serif; color: #388e3c; background: linear-gradient(180deg, #e8f5e9, #c8e6c9); }
        .bg-decor { position: fixed; inset: 0; z-index: -1; pointer-events: none; background:
            radial-gradient(600px 600px at 0% 0%, rgba(56,142,60,.12), transparent 60%),
            radial-gradient(600px 600px at 100% 0%, rgba(76,175,80,.10), transparent 60%),
            radial-gradient(600px 600px at 0% 100%, rgba(139,195,74,.08), transparent 60%),
            radial-gradient(600px 600px at 100% 100%, rgba(102,187,106,.10), transparent 60%);
            animation: floatBg 16s ease-in-out infinite alternate; }
        .container { max-width: 560px; margin: 80px auto; padding: 0 16px; }
    .card { background: #ffffff; border: 2px solid #a5d6a7; border-radius: 14px; box-shadow: 0 10px 30px rgba(56,142,60,.12), 0 4px 12px rgba(76,175,80,.10); overflow: hidden; transform: translateY(8px); opacity: 0; animation: cardIn .6s ease-out forwards; }
    .card-header { padding: 16px 20px; border-bottom: 2px solid #a5d6a7; background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%); }
    h1 { margin: 0; font-size: 22px; color: #388e3c; font-weight: 700; }
        .card-body { padding: 20px; animation: fadeIn .6s ease .15s both; text-align: center; background: #ffffff; }
        p { color: #333333; font-size: 16px; line-height: 1.5; }
        strong { color: #000000; font-weight: 600; }
        .actions { display: flex; justify-content: center; gap: 10px; margin-top: 20px; }
        .btn { padding: 12px 18px; text-decoration: none; border-radius: 10px; border: 2px solid transparent; font-size: 14px; font-weight: 600; box-shadow: 0 2px 8px rgba(0,0,0,.15); transition: transform .08s ease, box-shadow .2s ease, background-color .2s ease; cursor: pointer; }
        .btn:active { transform: translateY(1px); box-shadow: 0 0 0 rgba(0,0,0,0); }
    .btn-confirm { background: linear-gradient(135deg, #388e3c 0%, #43a047 100%); color: white; border-color: #388e3c; }
    .btn-confirm:hover { background: linear-gradient(135deg, #43a047 0%, #66bb6a 100%); border-color: #43a047; }
    .btn-cancel { background: linear-gradient(135deg, #f1f8e9 0%, #c8e6c9 100%); color: #388e3c; border-color: #388e3c; }
    .btn-cancel:hover { background: linear-gradient(135deg, #c8e6c9 0%, #a5d6a7 100%); border-color: #43a047; }
        @keyframes cardIn { to { transform: translateY(0); opacity: 1; } }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes floatBg { 0% { background-position: 0% 0%, 100% 0%, 0% 100%, 100% 100%; } 100% { background-position: 10% 5%, 90% 10%, 5% 90%, 95% 95%; } }
    </style>
</head>
<body>
    <div class="bg-decor"></div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Delete User</h1>
            </div>
            <div class="card-body">
                <p>Are you sure you want to delete <strong><?= $user['username'] ?></strong> (<?= $user['email'] ?>)?</p>
                <form action="<?= site_url('users/delete/' . $user['id']) ?>" method="POST">
                    <div class="actions">
                        <button type="submit" class="btn btn-confirm">Yes, Delete</button>
                        <a href="<?= site_url('users/view') ?>" class="btn btn-cancel">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>