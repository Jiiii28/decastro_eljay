<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->library('session');
        $this->call->model('AccountModel');
    }

    public function register()
    {
        if ($this->io->method() == 'post') {
            $username = trim($this->io->post('username'));
            $email    = trim($this->io->post('email'));
            $password = password_hash($this->io->post('password'), PASSWORD_DEFAULT);

            $data = [
                'username'   => $username,
                'email'      => $email,
                'password'   => $password,
                'created_at' => date('Y-m-d H:i:s')
            ];

            if ($this->AccountModel->insert_user($data)) {
                $this->session->set_flashdata('success', '✅ Account created successfully!');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('error', '❌ Registration failed.');
                redirect('auth/register');
            }
        }

        $data['flash'] = $this->session->flashdata();
        $this->call->view('auth/register', $data);
    }

    public function login()
    {
        $data['flash'] = $this->session->flashdata(); // pass flash messages to view

        if ($this->io->method() == 'post') {
            $username = trim($this->io->post('username'));
            $password = trim($this->io->post('password'));

            $account = $this->AccountModel->get_by_username($username);

            if (!$account) {
                $this->session->set_flashdata('error', '❌ Username not found.');
                redirect('auth/login');
                return;
            }

            if (password_verify($password, $account['password'])) {
                $_SESSION['user_id']  = $account['id'];
                $_SESSION['username'] = $account['username'];

                redirect('users/view'); // CRUD page
            } else {
                $this->session->set_flashdata('error', '❌ Invalid password.');
                redirect('auth/login');
            }
        }

        $this->call->view('auth/login', $data);
    }

    public function logout()
    {
        session_destroy();
        redirect('auth/login');
    }
}
?>
