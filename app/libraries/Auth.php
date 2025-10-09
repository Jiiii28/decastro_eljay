<?php
class Auth
{
    protected $db;
    protected $session;

    public function __construct()
    {
        $lava = lava_instance();                // Get LavaLust instance
        $lava->call->database();                // Initialize DB
        $lava->call->library('session');        // Initialize session

        $this->db = $lava->db;                  // Assign DB object
        $this->session = $lava->session;        // Assign session object
    }

    /**
     * Register a new account (no role)
     */
    public function register($username, $email, $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        return $this->db->table('accounts')->insert([
            'username'   => $username,
            'email'      => $email,
            'password'   => $hash,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Login a user
     */
    public function login($username, $password)
    {
        $user = $this->db->table('accounts')
                         ->where('username', $username)
                         ->get()
                         ->row_array();  // ✅ convert to array

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set_userdata([
                'user_id'   => $user['id'],
                'username'  => $user['username'],
                'logged_in' => true
            ]);
            return true;
        }

        return false;
    }

    /**
     * Check login status
     */
    public function is_logged_in()
    {
        return (bool) $this->session->userdata('logged_in');
    }

    /**
     * Logout
     */
    public function logout()
    {
        $this->session->unset_userdata(['user_id', 'username', 'logged_in']);
    }
}
?>
