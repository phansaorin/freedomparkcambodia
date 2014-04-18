<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questions extends HH_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model(array('mod_question'));
    }

    function index() {
    	$this->view();
    }

    function view() {
    	if ($this->session->userdata("admin")) {
    		$data["title"] = "Questions";
            $controller = $this->uri->segment(1);
            $function = $this->uri->segment(2);
            $config['base_url'] = site_url($controller . "/" . $function);
            $config['total_rows'] = HH_Model::count_all_data('hh_questions');
            $config['per_page'] = 15;
            $config['uri_segment'] = 3;
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = round($choice);
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Pre';
            $this->pagination->initialize($config); //function to show all pages
            $page = ($this->uri->segment($config['uri_segment']) && $this->uri->segment($config['uri_segment']) > 0) ? $this->uri->segment($config['uri_segment']) : 0;
            $data['questions'] = $this->mod_question->getAll($config['per_page'], $page);
            $data['pagination'] = $this->pagination->create_links();
            $this->view_master($data);
    	} else {
    		redirect("admin/");
    	}
    }

    function create(){
        if ($this->session->userdata("admin")) {
            $data["title"] = "New";
            $data['category'] = $this->mod_question->option("hh_categories", "category_id", "name");
            $data['parentQuestion'] = $this->mod_question->parentQuestion("hh_questions", "q_uid", "question");
            $this->view_master($data);
        } else {
            redirect("admin/");
        }
    }

    function save() {
        $question = $this->input->post("question");
        $category = $this->input->post("category");
        $parentQ = $this->input->post("parent-q");
        $answer = $this->input->post("answer");
        if ($this->input->post("btnSubmit")) {
            $saved = $this->mod_question->save($question, $category, $parentQ, $answer, "hh_questions");
            if ($saved) {
                $this->session->set_userdata('create', show_message("Create question with successfully!", "success"));
                redirect("questions/view");
            }
        } else if ($this->input->post("btnEdit")) {
           $id = $this->input->post("uid");
           $saved = $this->mod_question->update($id, $question, $category, $parentQ, $answer, "hh_questions");
            if ($saved) {
                $this->session->set_userdata('edit', show_message("Edit question with successfully!", "success"));
                redirect("questions/view");
            }
        }
    }

    /* VIEW EDIT FORM */
    function edit() {
        if ($this->session->userdata("admin")) {
            $data["title"] = "Edit";
            $data['category'] = $this->mod_question->option("hh_categories", "category_id", "name");
            $data['parentQuestion'] = $this->mod_question->parentQuestion("hh_questions", "q_uid", "question");
            $data['data'] = $this->mod_question->getEditByID($this->uri->segment(3));
            $this->view_master($data);
        } else {
            redirect("admin/");
        }
    }
    
    // DELETE AS PERMANENT
    public function removePermanent() {
        if ($this->session->userdata("admin")) {
            $control = 'questions';
            $func = 'view';
            $checkedID = $this->input->post('checkedID');
            HH_Controller::removeAsPermanent($control, $func, 'q_uid', $checkedID, 'hh_questions');            
        } else {
            redirect("admin/");
        }
    }


}