<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class HH_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function view_master($data){
		$this->load->view("admin", $data);
	}

	/*
	* Delete permanent from checkbox
	*/
	public function removeAsPermanent($controller, $func, $field, $checkedID, $table) {
		$result = HH_Model::removeAsPermanent($field, $checkedID, $table); //give argument to delete_datas() in CT_Model
            if ($result > 0) {
                $this->session->set_userdata('delete', show_message("Deleted successfully", "success"));
                if ($this->session->userdata('per_page')) {
                    redirect($controller . '/' . $func . '/' . '?limit=' . $this->session->userdata('per_page'));
                }
                redirect($controller . '/' . $func . '/' . $this->session->userdata('cur_page') . '/' . $this->session->userdata('pagination'));
            } else {
                $this->session->set_userdata('delete', show_message("Deleting was fail, please select check box!", "error"));
                if ($this->session->userdata('per_page')) {
                    redirect($controller . '/' . $func . '/' . '?limit=' . $this->session->userdata('per_page'));
                }
                redirect($controller . '/' . $func . '/' . $this->session->userdata('cur_page') . '/' . $this->session->userdata('pagination'));
            }
	}

}