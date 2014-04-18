<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_category extends HH_Model {

	/*
     * Get all contents
     * @param int
     * @return array
     */

    public function getAll($per_page, $offset) {
        $query = $this->db->select('*')
                ->where('deleted', 0)
                ->limit($per_page, $offset)
                ->get("hh_categories");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                $data[] = $rows;
            }
            return $data;
        }
        return FALSE;
    }

    function save($name, $table) {
        $insert = array(
            "name" => $name
        );
        $this->db->insert("$table", $insert);
        return $this->db->affected_rows() > 0;
    }

    /* GET RECORD DATA FROM ID */
    function getEditByID($id) {
        $data = $this->db->select('*')
            ->where("category_id", $id)
            ->get("hh_categories");
        return $data;
    }

    /* UPDATE RECORD DATA BY ID */
    function update($id, $categoryName, $table) {
        $data = array(
            "name" => $categoryName
        );
        $this->db->where("category_id", $id);
        return $this->db->update("$table", $data);
    }



}