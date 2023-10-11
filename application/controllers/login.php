<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('M_login');
    }



    public function index()
    {
        $this->load->view("head");
        $this->load->view('v_login');
        // $this->load->view("footer");

    }

    function aksi_login()
    {
        $username = $this->input->post('user_name');
        $password = $this->input->post('password');
        $where = array(
            'user_name' => $username,
            'password' => $password
        );
        $cek = $this->M_login->cek_login("user", $where)->num_rows();
        if ($cek > 0) {

            $data_session = array(
                'nama' => $username,
                'status' => "login"
            );

            $this->session->set_userdata($data_session);
            redirect(base_url("admin"));
        } else {
            echo "Username dan password salah !";
        }
    }


    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}