```php
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UserController
 * 
 */
class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->model('UserModel'); // ✅ load model once
        $this->call->library('pagination'); // ✅ load pagination library
    }

    public function index()
    {
        // Current page from URL segment (example: /users/index/2)
        $current_page = (int) segment(3) ?: 1;

        // Total rows (kailangan gumawa ka ng count_all() sa UserModel)
        $total_rows = $this->UserModel->count_all();

        // Rows per page
        $rows_per_page = 5;

        // Base URL for pagination links
        $base_url = 'users/index';

        // Initialize pagination with options
        $page_data = $this->pagination->initialize(
            $total_rows,
            $rows_per_page,
            $current_page,
            $base_url,
            5 // number of visible page links
        );

        // Optional: set a custom theme
        $this->pagination->set_theme('tailwind');

        // Optional: set custom CSS classes
        $this->pagination->set_custom_classes([
            'ul' => 'flex space-x-2',
            'li' => 'px-1',
            'a'  => 'px-3 py-1 rounded bg-gray-100 hover:bg-gray-200'
        ]);

        // Optional: override text options
        $this->pagination->set_options([
            'first_link' => '<< First',
            'last_link'  => 'Last >>',
            'next_link'  => 'Next >',
            'prev_link'  => '< Prev'
        ]);

        // Get paginated users
        $limit_clause = $page_data['limit']; 
        $users = $this->UserModel->get_paginated($limit_clause);

        // Pass data to view
        $this->call->view('users/index', [
            'users' => $users,
            'pagination' => $this->pagination->paginate(),
        ]);
    }

    public function create()
    {
        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $email = $this->io->post('email');

            $data = array(
                'username' => $username,
                'email' => $email
            );

            if ($this->UserModel->insert($data)) {
                redirect(site_url('users'));
            } else {
                echo 'Error creating user.';
            }
        } else {
            $this->call->view('users/create');
        }
    }

    public function update($id)
    {
        $user = $this->UserModel->find($id);

        if (!$user) {
            echo "User not found.";
            return;
        }

        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $email = $this->io->post('email');

            $data = array(
                'username' => $username,
                'email' => $email
            );

            if ($this->UserModel->update($id, $data)) {
                redirect(site_url('users'));
            } else {
                echo 'Error updating user.';
            }
        } else {
            $data['user'] = $user; // ✅ singular for update.php
            $this->call->view('users/update', $data);
        }
    }

    public function delete($id)
    {
        if ($this->UserModel->delete($id)) {
            redirect(site_url('users'));
        } else {
            echo 'Error deleting user.';
        }
    }
}
