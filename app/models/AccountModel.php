<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AccountModel extends Model
{
    protected $table = 'accounts'; // login table

    // 🔹 Insert new account
    public function insert_user($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    // 🔹 Get account by username
    public function get_by_username($username)
    {
        // LavaLust get() returns a single associative array or null
        $query = $this->db->table($this->table)
                          ->where('username', $username)
                          ->get();

        // 🔹 Just return $query directly
        return $query; // associative array if found, null if not
    }
}
?>
