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
    }

    public function index()
    {
        $data['users'] = $this->UserModel->all();
        $this->call->view('users/index', $data);
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
