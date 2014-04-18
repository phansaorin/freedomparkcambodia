<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends HH_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model(array('mod_category'));
    }

	public function index()
	{
		$this->view();
	}

	function view() {
		if ($this->session->userdata("admin")) {
    		$data["title"] = "Category";
            $controller = $this->uri->segment(1);
            $function = $this->uri->segment(2);
            $config['base_url'] = site_url($controller . "/" . $function);
            $config['total_rows'] = HH_Model::count_all_data('hh_categories');
            $config['per_page'] = 15;
            $config['uri_segment'] = 3;
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = round($choice);
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Pre';
            $this->pagination->initialize($config); //function to show all pages
            $page = ($this->uri->segment($config['uri_segment']) && $this->uri->segment($config['uri_segment']) > 0) ? $this->uri->segment($config['uri_segment']) : 0;
            $data['category'] = $this->mod_category->getAll($config['per_page'], $page);
            $data['pagination'] = $this->pagination->create_links();
            $this->view_master($data);
    	} else {
    		redirect("admin/");
    	}
	}

	function save() {
		if ($this->session->userdata("admin")) {
    		$categoryName = $this->input->post("categoryName");
    		$saved = $this->mod_category->save($categoryName, "hh_categories");
    		if ($saved) {
    			echo "saved";
    		}
    	} else {
    		redirect("admin/");
    	}
	}

    function edit($id) {
        if ($this->session->userdata("admin")) {
            $data["title"] = "Edit";
            $data['data'] = $this->mod_category->getEditByID($id);
            $this->view_master($data);
        } else {
            redirect("admin/");
        }
    }

    function update() {
        if ($this->session->userdata("admin")) {
           $id = $this->input->post("uid");
           $categoryName = $this->input->post("categoryName");
           if ($this->input->post("btnEdit")) {
               $saved = $this->mod_category->update($id, $categoryName, "hh_categories");
            if ($saved) {
                $this->session->set_userdata('edit', show_message("Edit question with successfully!", "success"));
                redirect("categories/view");
            }
           }
        } else {
            redirect("admin/");
        }
    }

    // DELETE AS PERMANENT
    public function removePermanent() {
        if ($this->session->userdata("admin")) {
            $control = 'categories';
            $func = 'view';
            $checkedID = $this->input->post('checkedID');
            HH_Controller::removeAsPermanent($control, $func, 'category_id', $checkedID, 'hh_categories');            
        } else {
            redirect("admin/");
        }
    }

}