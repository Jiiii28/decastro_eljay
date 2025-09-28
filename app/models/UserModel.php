<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UserModel
 * 
 * Automatically generated via CLI.
 */
class UserModel extends Model {
    protected $table = 'users';
    protected $primarykey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    // ✅ Bilangin lahat ng users
    public function count_all()
    {
        return $this->db->table($this->table)->count_all_results();
    }

    // ✅ Kunin users base sa pagination limit
    public function get_paginated($limit_clause)
    {
        return $this->db->table($this->table)->limit($limit_clause)->get_all();
    }
}
