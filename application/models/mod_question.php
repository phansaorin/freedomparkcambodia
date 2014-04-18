<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_question extends HH_Model {

    function __Construct() {
        parent::__Construct();
    }

    function sel_question($category_id) {
        $query = $this->db->select('q_uid, question')
            ->where('cateID', $category_id)
            ->where('parent_q', 0)
            ->limit(1)
            ->get("hh_questions");
        return $query;
    }

    function sel_next_question($parent_id, $category_id, $answer) {
        $query = $this->db->select('q_uid, question')
            ->where('cateID', $category_id)
            ->where('parent_q', $parent_id)
            ->where('answer', $answer)
            ->limit(1)
            ->get("hh_questions");
        return $query;
    }

	/*
     * Get all contents
     * @param int
     * @return array
     */

    public function getAll($per_page, $offset) {
        $query = $this->db->select('*')
                ->join('hh_categories', 'hh_questions.cateID = hh_categories.category_id')
                ->join("hh_images", "hh_images.image_id = hh_questions.imageID", "left")
                ->where('hh_questions.deleted', 0)
                ->limit($per_page, $offset)
                ->get("hh_questions");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                $data[] = $rows;
            }
            return $data;
        }
        return FALSE;
    }

    /* OPION FOR DROWDOWN LIST */
    public function option($table, $index, $value) {
        $query = $this->db->select('*')
                ->where('deleted', 0)
                ->get("$table");
        $option[0] = '-- Select --';
        foreach ($query->result_array() as $rows) {
            $option[$rows["$index"]] = $rows["$value"];
        }
        return $option;
    }

    public function parentQuestion($table, $index, $value) {
        $query = $this->db->select('*')
                ->where('deleted', 0)
                ->get("hh_questions");
        $option[0] = '-- Select --';
        foreach ($query->result_array() as $rows) {
            $option[$rows['q_uid']] = $rows['question'];
        }
        return $option;
    }

    function save($question, $category, $parentQ, $answer, $table) {
        $insert = array(
            "question" => $question,
            "cateID" => $category,
            "parent_q" => $parentQ,
            "answer" => $answer
        );
        $this->db->insert("$table", $insert);
        return $this->db->affected_rows() > 0;
    }

    /* GET RECORD DATA FROM ID */
    function getEditByID($id) {
        $data = $this->db->select('*')
            ->join('hh_categories', 'hh_questions.cateID = hh_categories.category_id')
            ->join("hh_images", "hh_images.image_id = hh_questions.imageID", "left")
            ->where("q_uid", $id)
            ->get("hh_questions");
        return $data;
    }

    /* UPDATE RECORD DATA BY ID */
    function update($id, $question, $category, $parentQ, $answer, $table) {
        $data = array(
            "question" => $question,
            "cateID" => $category,
            "parent_q" => $parentQ,
            "answer" => $answer
        );
        $this->db->where("q_uid", $id);
        return $this->db->update("$table", $data);
    }

}