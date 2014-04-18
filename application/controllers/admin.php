<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends HH_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model(array('mod_admin'));
    }

	public function index()
	{
		$this->login();
	}

	public function login() {
		$data["title"] = "Login";
		if ($this->input->post("btnLogin")) {
			$username = $this->input->post("txt_username");
			$password = $this->input->post("txt_password");
			$login = $this->mod_admin->login($username, $password);
			if ($login->num_rows() > 0) {
                foreach ($login->result() as $rows) {
                    $this->session->set_userdata('full_name', ucfirst($rows->fname) . ' ' . strtoupper($rows->lname));
                    $id = $rows->user_id;
                    $this->session->set_userdata('admin', $id);
                    redirect('admin/dashboard');
                }
            } else {
                $this->session->set_userdata('login', show_message('Your username or password is not match!', 'error'));
                $this->view_master($data);
            }
		} else {
			$this->view_master($data);
		}
	}

	/* LOGOUT */
	public function sign_out() {
        // $this->session->sess_destroy();
        $this->session->set_userdata('sign_out', show_message('You have been logout!', 'notice'));
        $this->session->unset_userdata('admin');
        redirect("admin/");
    }

    /* DASHBOARD VIEW */
	public function dashboard() {
		$data["title"] = "Dashboard";
		
		$this->view_master($data);
	}

}