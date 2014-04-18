<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_hinghong extends CI_Controller {

	public function index()
	{
//		$this->load->view('index');
            $data['title'] = "Welcome";
            $this->main($data);
	}
        
        public function page(){
            
        }

        public function main($data) {
            $this->load->view("index", $data);
        }
}