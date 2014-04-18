<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
    
 function __construct()
 {
   parent::__construct(); 
   $this->load->model(array('mod_question'));
 }

	public function index()
	{
		$this->question();
	}
	
	/*public function question($parent_id)
	{
    $data['title'] = "Hinghorng Welcome";
    $data['question'] = $this->mod_question->sel_question($parent_id);
		$this->load->view('page/question',$data);
	}*/
  public function question($category_id)
  {
    $data['title'] = "Hinghorng Welcome";
    $data['question'] = $this->mod_question->sel_question($category_id);
    $this->load->view('page/question',$data);
  }
        
  /*public function next_question() {
      $id = $this->input->post('id');
      $parent_id = $this->input->post('parent_id');
      $data['question'] = $this->mod_question->sel_next_question($id, $parent_id);
      if($data['question']->num_rows() > 0) {
          foreach ($data['question']->result() as $row) {
              echo "<span id='$row->q_uid' class='question'>".$row->question."</span>";
          }
     }
     else {
          echo 0;
     }
  }*/

  /* Click for next question Yes Option */
  public function next_question() {
      $parent_id = $this->input->post('id');
      $category_id = $this->input->post('cateID');
      $data['question'] = $this->mod_question->sel_next_question($parent_id, $category_id, "yes");
      if($data['question']->num_rows() > 0) {
          foreach ($data['question']->result() as $row) {
              echo "<span id='$row->q_uid' class='question'>".$row->question."</span>";
          }
     }
     else {
          echo 0;
     }
  }

/* Click for next question No Option */
  public function next_question_no() {
      $parent_id = $this->input->post('id');
      $category_id = $this->input->post('cateID');
      $data['question'] = $this->mod_question->sel_next_question($parent_id, $category_id, "no");
      if($data['question']->num_rows() > 0) {
          foreach ($data['question']->result() as $row) {
              echo "<span id='$row->q_uid' class='question'>".$row->question."</span>";
          }
     }
     else {
          echo 0;
     }
  }
        
       public function finished(){
          $data['title'] = "Funny Video";
           $this->load->view('page/finished', $data);
       }
       
       public function vedio_no(){
          $data['title'] = "Funny Video";
           $this->load->view('page/vedio_no', $data);
       }
        
}
?>